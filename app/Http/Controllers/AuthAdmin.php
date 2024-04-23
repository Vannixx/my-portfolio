<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthAdmin extends Controller
{
    function dashboard(){
        return view('admin.dashboard');
    }
    //to check if nag-log in ang user
    function login(){
        if(Auth::check()){
            return redirect()->intended(route('userprofile'))->with("success");
        }
        return view('admin.Login');
    }
    //Register
    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'username'=>'required',
            'password'=>'required',
        ]);

        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $user = User::create($data);
        if(!$user){
            return redirect(route('login'))->with("error","Registration Failed");
        }
        return redirect(route('login'))->with("success","Registered Successfully!");

    }

    //Login
    function loginPost(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            return redirect(route('userprofile'))->with("success","Loged in Successfully");
        }
        return redirect(route('login'));
    }

    //logout
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

}
