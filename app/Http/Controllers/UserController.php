<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
public function Logout(Request $request){
    Auth::logout();
    return view('index');
}
public function Login(Request $request){
    $logindata=$request->validate([
       'email'=>['required'],
       'password'=>['required']
    ]);
    auth::login($logindata);
    return view('homepage');
}
}
