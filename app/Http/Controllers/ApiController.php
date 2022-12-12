<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(){
        $user = User::where('email',request('email'))->first();
        if(Hash::check(request('password'),$user->password)){
            $token = $user->createToken('angular')->plainTextToken;
            return response()->json([
                'email' => request('email'),
                'password' => request('password'),
                'token' => $token,
                'message ' => 'user is valid',
                'status' => 200
            ]);
        }else{
            return response()->json([
                'email' => request('email'),
                'password' => request('password'),
                'message' => 'user password is invalid',
                'status' => 250
            ]);
        }
    }
    public function getProfile(){
        $userId = auth()->user()->id;
        $user = User::find($userId);
        return response()->json([
            'status' => 200,
            'data' => [
                'profile' => $user,
                'age' => $user->userage,
                'user' => $user

            ],

            'message' => 'Successfully'
        ]) ;
    }
    public function logout(){
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $user->tokens()->delete();
        return response()->json([
            'message' => 'user logout successfully',
            'status' => 200
        ]);
    }
}
