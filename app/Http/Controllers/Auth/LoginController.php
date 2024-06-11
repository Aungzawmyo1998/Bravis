<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{




    public function adminLoginShow() {
        return  view('admins.login');
    }

    public function adminLogin ( Request $request )
    {
        // $request->valildate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        // ]);

        $auth = $request -> only('email','password');
        if( auth('admin')->attempt($auth) ) {
            $admin = auth('admin')->user();

            if($admin->status == 'active' ) {

                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login.show');
            }

        }
    }

    public function customerLogin () {
        return view('customers.login');
    }

    public function customerLoginProcess (Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'email is required',
            'email.email' => 'email is invilade',
            'password.required' => 'password is required',
        ]);


        $auth = $request->only('email','password');

        if( auth('customer')->attempt($auth)) {
           $status = auth('customer')->user();

           if( $status->status == 'active') {

            return redirect()->route('home');
           } else {
            
            Auth::logout();
            return redirect()->back();
           }

        } else {
            Auth::logout();
            return redirect()->back();
        }

    }


}
