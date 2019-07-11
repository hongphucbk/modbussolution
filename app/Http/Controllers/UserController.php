<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\User;
use App\PassReset;
use App\UserGroup;
use Mail;
use App\Mail\UserVerify;
use App\Mail\PasswordReset;
use Hash;

//use Illuminate\Contracts\Auth\CanResetPassword;
//use Illuminate\Auth\Passwords\CanResetPassword;

class UserController extends Controller
{
	public function get_Login_Admin()
	{
		return view('admin.login.login');
	}

	public function post_Login_Admin(Request $request)
	{
		$this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required'=>'Please input username',
            'password.required'=>'Bạn chưa nhập password',
        ]);
		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
		{
			return redirect('admin/user');
		}else{
			return redirect('admin/login')->with('notification','Login no successfully');
		}
		
	}

	public function get_Logout_Admin()
	{
		Auth::logout();
		return redirect('admin/login');
	}

	public function get_Signup()
	{
		return view('pages.login.signup');
	}

	public function post_Signup(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password'=>'required|min:5|max:32',
            're_password' => 'required|same:password'
            
        ],
        [
            'name.required'=>'* Please input your name',
            'email.required'=>'* Please input your email',
            'email.unique'=>'* Email had exist',
            'password.required'=>'* Please input password',
            'password.min'=>'* Password is 5 character minimum',
            'password.max'=>'* Password is 32 character maximum',
            're_password.required' =>'* Please input password again',
            're_password.same' =>'* Password again is not same',
        ]);

		$confirmation_code = time().uniqid(true);
		$user_group = UserGroup::where('name','Guest')->first();
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->users_group_id = $user_group->id;
		$user->confirmation_code = $confirmation_code;
		$user->confirmed = 0;
		$user->password = bcrypt($request->password); //rand_string(6);
		$user->save();

        Mail::to($user)->send(new UserVerify($user, $confirmation_code));
		return redirect()->back()->with('notification','Register successfully. Please check mail to verify your account');
	}

	public function get_Login()
	{
		//Return view
		return view('pages.login.login');
	}
	
	public function post_Login(Request $request)
	{
		$this->validate($request,[
            'email' => 'required',
            'password'=>'required',           
        ],
        [
            'email.required'=>'* Please input your email',
            'password.required'=>'* Please input password',
        ]);

		if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'confirmed' => 1]))
        {
            return redirect('/');
        }
        else{
            return redirect('login')->with('notification','Login not successfully');
        }
	}

	public function get_Logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function get_ResetPassword()
    {
    	return view('pages.login.passwordreset');
    }

    public function post_ResetPassword(Request $request)
	{
		$this->validate($request,[
            'email' => 'required',           
        ],
        [
            'email.required'=>'* Please input your email',
        ]);

		$new_pass = rand_string(10);
		$token = Hash::make($new_pass);

		//$token = bcrypt($new_pass);

		$user = User::where('email',$request->email)->first();
		if ($user) {
			$passreset = new PassReset;
			$passreset->email = $request->email;
			$passreset->token = $token;
			$passreset->save();

			Mail::to($user)->send(new PasswordReset($user, $new_pass));
			return redirect()->back()->with('notification','Please check mail to get password');

		} else {
			return redirect('password/reset')->with('notification','Email is not exist. Please register');
		}
		  
	}

	public function get_NewPassword($new_password)
    {
    	$pass_resets = PassReset::all();
    	foreach ($pass_resets as $key => $val) {
    		if(Hash::check($new_password, $val->token)){
		    	$email = $val->email;
	    		return view('pages.login.newpassword',compact('new_password','email'));
	    	} else {
	    		return view('pages.login.invalid');
			}
    	}
		return view('pages.login.invalid');
    }

    public function post_NewPassword($new_password,Request $request)
	{
		$this->validate($request,[
            'password'=>'required|min:5|max:32',
            're_password' => 'required|same:password'         
        ],
        [
            'password.required'=>'* Please input password',
            'password.min'=>'* Password is 5 character minimum',
            'password.max'=>'* Password is 32 character maximum',
            're_password.required' =>'* Please input password again',
            're_password.same' =>'* Password again is not same',
        ]);

		$user = User::where('email',$request->email)->first();
		$user->password = bcrypt($request->password);
		$user->save();

		$token = PassReset::where('email',$request->email)->first();
		$token->delete();

		return redirect('login')->with('notification','Change password successfully. Please login to page');		  
	}

	public function get_List_Admin()
	{
		$users = User::all();
		$user_group = UserGroup::all();
		return view('admin.user.list',compact('users','user_group'));
	}

	public function get_Add_Admin()
	{
		$user_group = UserGroup::all();
		return view('admin.user.add',compact('user_group'));
	}

	public function post_Add_Admin(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên group',
        ]);

		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->users_group_id = $request->users_group_id;
		$user->password = bcrypt(123456); //rand_string(6);
		$user->save();
		return redirect()->back()->with('notification','Add successfully');
	}

	public function get_Edit_Admin($id)
	{
		$user = User::find($id);
		$user_group = UserGroup::all();
		return view('admin.user.edit',compact('user','user_group'));
	}

	public function post_Edit_Admin($id, Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên group',
        ]);

		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->users_group_id = $request->users_group_id;
		//$user->password = bcrypt(123456); //rand_string(6);
		//Kiểm tra file
        if ($request->hasFile('avata')) {
            $file = $request->avata;
            //Lấy Tên files
            // echo 'Tên Files: ' . $file->getClientOriginalName();
            // echo '<br/>';
            //Lấy Đuôi File
            // echo 'Đuôi file: ' . $file->getClientOriginalExtension();
            // echo '<br/>';

            // //Lấy đường dẫn tạm thời của file
            // echo 'Đường dẫn tạm: ' . $file->getRealPath();
            // echo '<br/>';

            // //Lấy kích cỡ của file đơn vị tính theo bytes
            // echo 'Kích cỡ file: ' . $file->getSize();
            // echo '<br/>';

            // //Lấy kiểu file
            // echo 'Kiểu files: ' . $file->getMimeType();


            $fullName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $fullNameLenght = strlen($fullName);
            $extensionLenght = strlen($extension);
            $nameLength = $fullNameLenght - ($extensionLenght + 1);
            $onlyName = substr($fullName, 0, $nameLength);

            $fileNewName = $onlyName.'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();

            $file->move('upload/avata',$fileNewName);
            $user->avata = $fileNewName;
        }
		$user->save();
		return redirect()->back()->with('notification','Edit successfully');
	}
	
	public function get_Delete_Admin($id)
	{
		//Step 1: Delete all user belongTo this group

		//Step 2: Delete all Role in UserRole belongTo this group

		//Step 3: Delete
		$user = User::find($id);
		$user->delete();
		return redirect()->back()->with('notification','Deleted successfully');
	}
	
	public function get_Export_Admin()
	{
		return Excel::download(new UsersExport, 'users.xlsx');
	}
}
