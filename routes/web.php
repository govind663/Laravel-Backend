<?php

use Illuminate\Support\Facades\Route;

// ====== Admin
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\RegisterController as AdminRegisterController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController as AdminForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController as ResetPasswordController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

Route::get('/', function () {
    return view('admin.auth.login');
})->name('/');


Route::group(['prefix' => 'admin'],function(){

    // ======================= Admin Register
    Route::get('register', [AdminRegisterController::class,'register'])->name('admin.register');
    Route::post('register/store', [AdminRegisterController::class,'store'])->name('admin.register.store');

    // ======================= Admin Login/Logout
    Route::get('login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('login/store', [AdminLoginController::class, 'authenticate'])->name('admin.login.store');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // ======================= Admin Password Reset
    Route::get('forgot-password', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.forget-password.request');
    Route::post('forgot-password/send-email-link', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.forget-password.send-email-link.store');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('admin.password.update');

});

Route::group(['prefix' => 'xoom-digital', 'middleware' => ['auth:web']], function () {

    // ===== Admin Dashboard
    Route::get('dashboard', [AdminHomeController::class, 'adminHome'])->name('admin.dashboard');

});
