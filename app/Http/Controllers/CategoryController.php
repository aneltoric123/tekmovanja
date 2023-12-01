<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

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
public function category_delete($id){

   $category= CategoryModel::find($id);
   if (!$category) {
    return redirect('/homepage')->with('error', 'Category not found.');
}
   $category->delete();

   Session::flash('success', 'Kategorija izbrisana!');
   return redirect('/homepage');

}
public function updateCategory(Request $request, $id)
{
    $request->validate([
        'category_name' => 'required|min:2|max:255' // Adjust validation rules as needed
    ]);

    $category = CategoryModel::findOrFail($id);
    $category->ime_kategorije = $request->input('category_name');
    $category->save();
        Session::flash('success', 'Kategorija posodobljena!');
return redirect('/homepage');

    }

}

