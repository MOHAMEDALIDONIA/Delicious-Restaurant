<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    // Route::get('register/admin', [RegisteredUserController::class, 'create'])
    //             ->name('register.admin');

    // Route::post('register/admin/store', [RegisteredUserController::class, 'store'])->name('register.store.admin');

    Route::get('login/admin', [AuthenticatedSessionController::class, 'create'])
                ->name('login.admin');

    Route::post('login/admin/store', [AuthenticatedSessionController::class, 'store'])->name('login.store.admin');

    Route::get('forgot-password/admin', [PasswordResetLinkController::class, 'create'])
                ->name('password.request.admin');

    Route::post('forgot-password/admin', [PasswordResetLinkController::class, 'store'])
                ->name('password.email.admin');


});

Route::middleware('auth:admin')->group(function () {


    Route::post('logout/admin', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout.admin');
});
