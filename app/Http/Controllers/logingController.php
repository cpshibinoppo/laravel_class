<?php

namespace App\Http\Controllers;


class logingController
{
    public function login(){
        return view('user.login');
    }
    public function dologin(){
        $input = ['email' => request('email'),'password' => request('password')];
        if(auth()->attempt($input,true)){
            return redirect('home');
        }else{
            return 'login failed';
        }
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
