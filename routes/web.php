<?php

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
Route::get('/',function (){
    return "Şu Anda Hizmet Veremiyoruz...";
});

Route::resource('/users',\App\Http\Controllers\Backend\UserController::class);

Route::get('/users/{user}/change-password',[\App\Http\Controllers\Backend\UserController::class,'passwordForm']);
Route::post('/users/{user}/change-password',[\App\Http\Controllers\Backend\UserController::class,'changePassword']);

Route::resource('users/{user}/addresses',\App\Http\Controllers\Backend\AddressController::class);

