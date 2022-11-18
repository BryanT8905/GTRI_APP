<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ChangePasswordController;
use App\Http\Controllers\Tools\AssetController;
use App\Http\Middleware;

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




Route::get('/register', [RegisterController::class, 'index']);

Route::get('/logout', [LoginController::class, 'logout']);

/*if user registration is not needed in app we can disable in Auth::routes() */
Auth::routes(['register'=>false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'auth.isAdmin'])->group(function (){
    //Resource route for user management crud functionality(create,delete etc.)
    Route::resource('admin/users', UserController::class);

});

Route::middleware(['auth'])->group(function (){
    Route::resource('user/profiles', ProfileController::class);

});

Route::middleware(['auth', 'auth.manageAssets'])->group(function (){
    Route::resource('tools/assets', AssetController::class);

});

Route::middleware(['auth'])->group(function (){
    Route::resource('user/passwords', ChangepasswordController::class);

});

Route::view('tools/permissions', 'tools.permissions')->middleware('auth');



