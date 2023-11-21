<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Auth\User;
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
    $user = User::create([
        'fullname' => $request->input('polno_ime'),
        'vzdevek' => $request->input('vzdevek'),
        'email' => $request->input('email'),
        'geslo' => Hash::make($request->input('password')),
    ]);

    Session::flash('success', 'Registracija uspešna!');
    return redirect('/index');
}

}
