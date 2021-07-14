<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\UserController;

class SessionController extends Controller
{
    public static function  login(){
        $attributes = request()->validate([
            'user_name' => 'required|exists:users,user_name',
            'password' => 'required|min:7|max:255',
        ]);

        if(auth()->attempt($attributes)){
            $user = User::where('user_name', $attributes['user_name'])->first();
            return '{"api_token": "'.$user->api_token.'"}';
        }

        return "Login failed";
    }

    public static function logout(){

        auth()->logout();

        return redirect('home');
    }

    public static function register(){
        return $user = UserController::store();
    }

    public static function checkSession(){
        return auth()->check();
    }
}
