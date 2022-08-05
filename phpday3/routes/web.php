<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('contact',[UserController::class,'insertUser']);
Route::get('contact/',[UserController::class,'getUserByInput']);
Route::get('contacts/',[UserController::class,'getUsers']);
Route::delete('contact/byName',[UserController::class,'deleteUserByName']);
Route::delete('contact/byEmail',[UserController::class,'deleteUserByEmail']);
Route::delete('contact/byMobile',[UserController::class,'deleteUserByMobile']);
