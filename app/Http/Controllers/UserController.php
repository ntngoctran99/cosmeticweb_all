<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        return view('Login.login');
    }

    public function postLogin(Request $request)
    {
        if($request->username == '' || $request->password == ''){
            return redirect()->back()->with('status', 'Username or Password is not correct');
        }

        $login = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect('admin');
        }
        else{
            return redirect('/login')->with('status', 'Username or Password is not correct')->send();
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
