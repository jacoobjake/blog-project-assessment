<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public static function index(){
        return User::all();
    }

    public static function show(User $user){
        return $user;
    }

    public static function store(){
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'user_name' => 'required|unique:users,user_name|min:5|max:255',
            'password' => 'required|min:7|max:255',
            'email' => 'required|email|max:255',
        ]);

        $attributes['api_token'] = Str::random(10);
        $attributes['remember_token'] = Str::random(10);

        if(User::create($attributes)){
            return 'user created succcessfully';
        }else{
            return 'User creation unsuccessful';
        }
    }

    public static function update(){
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'user_name' => 'required|exists:users,user_name',
            'password' => 'required|min:7|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::where('user_name', $attributes['user_name'])->first();

        $user->name = $attributes['name'];
        $user->password = $attributes['password'];
        $user->email = $attributes['email'];

        if($user->save()){
            return 'user updated succcessfully';
        }else{
            return 'User update unsuccessful';
        }

        return($user);
    }

    public static function delete(){
        $attributes = request()->validate([
            'user_name' => 'required|exists:users,user_name',
        ]);

        $user = User::where('user_name', $attributes['user_name'])->first();

        if($user->delete()){
            return 'user deleted succcessfully';
        }else{
            return 'User deleted unsuccessful';
        }
    }
}
