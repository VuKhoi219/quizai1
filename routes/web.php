<?php

use App\Models\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('users.welcome');
})->name('home');
Route::get('/index', function () {
    $usersID = Session::get('user_id');
    $users =Users::findOrFail($usersID);
    return view('users.welcomeHomeUser',compact('users'));
})->name('homeUser');

Route::get('/user/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('/user/login/post', [UserController::class, 'loginPost'])->name('login.post');

Route::get('/user/register', [UserController::class, 'viewRegister'])->name('register');
Route::post('/user/register/post', [UserController::class, 'registerPost'])->name('register.post');

Route::get('/user/update', [UserController::class, 'viewUpdate'])->name('update');
Route::post('/user/update1', [UserController::class, 'update'])->name('update.post');

Route::get('/user/update/password', [UserController::class, 'viewUpdatePassword'])->name('updatePassword');
Route::post('/user/update/password1', [UserController::class, 'updatePassword'])->name('updatePassword.post');

