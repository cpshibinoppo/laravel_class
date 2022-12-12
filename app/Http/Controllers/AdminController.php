<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('user.admin_login');
    }
    public function dologin(){
        $input = ['email' => request('email'),'password' => request('password')];
        if(auth()->guard('admin')->attempt($input,true)){
            return redirect()->route('admin.user');
        }else{
            return 'login failed';
        }
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function home(){
        return view('admin');
    }
}
