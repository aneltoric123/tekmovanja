<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Auth\Authenticatable;
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
        'datum_rojstva'=>['required'],
        'email' => ['required', 'string', 'email', 'max:55', 'unique:uporabniki'],
        'password' => ['required', 'string', 'min:8', 'max:55', 'confirmed'],
    ]);

    if ($validator->fails()) {
        Session::flash('error', 'Registracija neuspešna');
        return redirect('/reg')->withErrors($validator)->withInput();
    }

    $user = User::create([
        'fullname' => $request->input('polno_ime'),
        'datum_rojstva' => $request->input('datum_rojstva'),
        'vzdevek' => $request->input('vzdevek'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password'))
    ]);
   Auth::login($user);

    Session::flash('success', 'Registracija uspešna!');
    return redirect('/homepage');
}
public function authenticate(Request $request){

    validator(request()->all(),[
        'email' => ['required', 'email'],
        'password' => ['required']
    ])->validate();

    if(auth()->attempt(request()->only(['email','password']))){
        Session::flash('success', 'Prijava uspešna!');
        return redirect('/homepage');
    }
else{
    Session::flash('error', 'Prijava neuspešna');
    return redirect('/index')->withErrors(['email' => 'Prijava neuspešna'])->withInput();
}
}

public function logout(){
    Auth::logout();
    Session::flash('success', 'Uspešno  odjavljen!');
    return redirect("/index");
}

}
