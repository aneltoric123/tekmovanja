<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function show_categories()
    {
        $ime_kategorije = CategoryModel::all();

        return view('homepage', compact('ime_kategorije'));
    }
public function category_create(Request $request){
    $validator = Validator::make($request->all(), [
        'ime_kategorije' =>['required','min:4','max:55','unique:kategorije']
    ]);

    if ($validator->fails()) {
        Session::flash('error', 'Napaka');
        return redirect('/homepage')->withErrors($validator)->withInput();
    }

    $category = CategoryModel::create([
        'ime_kategorije' => $request->input('ime_kategorije'),

    ]);
    Session::flash('success', 'Kategorija ustvarjena!');
    return redirect('/homepage');
}

}
