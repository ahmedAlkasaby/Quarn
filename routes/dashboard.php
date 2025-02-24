<?php

use App\Http\Controllers\Dashboard\CircleController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\TeacherController;
use Illuminate\Support\Facades\Route;





Route::group(['middleware' => [ 'auth:admin','lang','admin']], function () {
    Route::get('/',[HomeController::class, 'home'])->name('dashboard');
    Route::resource('roles',RoleController::class)->except('show');
    Route::resource('teachers',TeacherController::class);
    Route::resource('circles',CircleController::class);
    Route::resource('students',StudentController::class);
});

// Route::get('test', function () {
//     return "Middleware is working!";
// })->middleware('admin');
