<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\HelpdeskActivity;
use App\Role;

class WebserverController extends Controller
{

	public function get_Page_S71200()
	{
		//$tickets = HelpdeskActivity::all();
		//$user_group = UserGroup::all();
		return view('pages.webserver.s71200.index');
	}

	// public function get_Add_Admin()
	// {
	// 	return view('admin.role.add');
	// }

	// public function post_Add_Admin(Request $request)
	// {
	// 	$this->validate($request,[
 //            'name' => 'required',
 //        ],
 //        [
 //            'name.required'=>'Please input role name',
 //        ]);

	// 	$role = new Role;
	// 	$role->name = $request->name;
	// 	$role->note = $request->note;

	// 	$role->save();
	// 	return redirect()->back()->with('notification','Add successfully');
	// }

	// public function get_Edit_Admin($id)
	// {
	// 	$role = Role::find($id);
	// 	return view('admin.role.edit',compact('role'));
	// }

	// public function post_Edit_Admin($id, Request $request)
	// {
	// 	$this->validate($request,[
 //            'name' => 'required',
 //        ],
 //        [
 //            'name.required'=>'Please input your role',
 //        ]);

	// 	$role = Role::find($id);
	// 	$role->name = $request->name;
	// 	$role->note = $request->note;
	// 	$role->save();
	// 	return redirect()->back()->with('notification','Edit successfully');
	// }
	

	// public function get_Delete_Admin($id)
	// {
	// 	//Step 1: Delete all role belongTo this group

	// 	//Step 2: Delete all Role in UserRole belongTo this group

	// 	//Step 3: Delete
	// 	$role = Role::find($id);
	// 	$role->delete();
	// 	return redirect()->back()->with('notification','Deleted successfully');
	// }
}
