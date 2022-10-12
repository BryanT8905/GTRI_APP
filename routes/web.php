<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;


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
    //Create resource route since user management is a crud functionality(create,delete etc.)
    Route::resource('admin/users', UserController::class);

});