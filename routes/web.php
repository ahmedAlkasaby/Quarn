<?php

use App\Http\Controllers\Dashboard\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('ahmed');
Route::group(['middleware'=>['guest:admin']],function(){
    Route::get('login',[AuthController::class,'showLogin'])->name('login.show');
    Route::post('login',[AuthController::class,'login'])->name('login');
});
Route::group(['middleware'=>['auth:admin','lang','admin']],function(){
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});


