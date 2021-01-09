<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{

public function login(){

            return view('dashboard.Auth.login');

        }

        //end of login

 public function post_login (AdminLoginRequest $request)
        {
            $remember_me = $request->has('remember-me') ? true: false ;

                if (auth()->guard('admins')->attempt(['email'=>$request->email , 'password' => $request->password]))

                    return redirect()->route('admin.Dashboard');


                return redirect()->back()->with(['error' => 'Something Went Wrong ']);
        }
//end of post_login

}
