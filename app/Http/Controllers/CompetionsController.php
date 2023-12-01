<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetionModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CompetionsController extends Controller
{

public function create_comp(Request $request){
    $validator = Validator::make($request->all(), [
        'ime_tekmovanja' =>['required','min:4','max:55','unique:tekmovanja2'],
        'opis_tekmovanja' => ['required', 'max:255'],
        'kategorija_id'=>['required'],
        'user_id'=>[],
    ]);

    if ($validator->fails()) {
        Session::flash('error', 'Napaka');
        return redirect('/homepage')->withErrors($validator)->withInput();
    }
    $user_id = auth()->id();
    $kategorija_id = $request->input('kategorija_id');

    $competetion=CompetionModel::create([
     'ime_tekmovanja'=>$request->input('ime_tekmovanja'),
     'opis_tekmovanja'=>$request->input('opis_tekmovanja'),
     'kategorija_id'=>$kategorija_id,
     'ustvarjalec_id'=>$user_id,
    ]);
    Session::flash('success', 'Uspešno ustvarjeno tekmovanje!');
    return redirect('/homepage');
}
}
