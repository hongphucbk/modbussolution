<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\UserEmail;
use App\Mail\AnComEmail;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function sendEmailReminder(Request $request)
    {
        $id = 3; // điền 1 mã id bất kỳ của user trong bảng users 
        $user = User::findOrFail($id);

        Mail::to($user)->send(new UserEmail());
    }

    public function sendEmailAnCom(Request $request)
    {
        $id = 3; // điền 1 mã id bất kỳ của user trong bảng users 
        $user = User::findOrFail($id);

        Mail::to('phuc.truong@bluescope.com')
            //->cc(['Dinh.Ha@bluescope.com','Lieu.Tran@bluescope.com','Huong.Le@bluescope.com','Hue.Bui@bluescope.com'])
            ->send(new AnComEmail());
    }
}