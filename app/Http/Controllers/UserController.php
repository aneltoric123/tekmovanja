<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'polno_ime' => ['required', 'string', 'min:4', 'max:55'],
        'vzdevek' => ['required', 'string', 'min:4', 'max:55', 'unique:uporabniki'],
        'email' => ['required', 'string', 'email', 'max:55', 'unique:uporabniki'],
        'password' => ['required', 'string', 'min:8', 'max:55', 'confirmed'],
    ]);

    if ($validator->fails()) {
        Session::flash('error', 'Registracija neuspešna');
        return redirect('/reg')->withErrors($validator)->withInput();
    }
    $user = new UserModel();
    $user = UserModel::create([
        'fullname' => $request->input('polno_ime'),
        'vzdevek' => $request->input('vzdevek'),
        'email' => $request->input('email'),
        'geslo' => Hash::make($request->input('password')),
    ]);

    Session::flash('success', 'Registracija uspešna!');
    return redirect('/index');
}
public function authenticate(Request $request){
    $credentials = new UserModel();
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        Session::flash('success', 'Prijava uspešna!');
        return redirect('/homepage');
    }
else{
    Session::flash('error', 'Prijava neuspešna');
    return redirect('/index')->withErrors(['email' => 'Prijava neuspešna'])->withInput();
}
}

}
