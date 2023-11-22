<?php

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/reg', function () {
    return view('reg');
});
Route::post('/reg', [UserController::class, 'register']);

Route::post('/index', [UserController::class, 'register']);
Route::post('/', [UserController::class, 'register']);

Route::get('/homepage', function () {
    return view('homepage');
});
Route::post('/homepage', [UserController::class, 'authenticate']);
Route::post('/index', [UserController::class, 'authenticate']);

Route::get('/profile',function(){
 return view( 'profile');
});


