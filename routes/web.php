<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/template', function () {
    return view('layouts.template');
});




Route::group(['middleware' => 'auth'], function(){
    Route::redirect('/', 'dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout']);



    // Setting
	Route::prefix('setting')->group(function(){
		Route::get('change-password', [SettingController::class, 'changePassword'])->name('setting.change_password');
		Route::post('save-password', [SettingController::class, 'savePassword'])->name('setting.save_password');
		Route::get('profile', [SettingController::class, 'profile'])->name('setting.profile');
		Route::post('save-profile', [SettingController::class, 'saveProfile'])->name('setting.save_profile');
	});
});




