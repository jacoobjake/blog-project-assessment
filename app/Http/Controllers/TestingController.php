<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestingController extends Controller
{
    public static function test(Request $request){
        return '{"csrf_token": "'.csrf_token().'"}';
        return $request->header();
    }
}
