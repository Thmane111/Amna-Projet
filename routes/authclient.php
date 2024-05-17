<?php

use App\Http\Controllers\Client\AuthenticatedSessionController;
use App\Http\Controllers\Client\ConfirmablePasswordController;
use App\Http\Controllers\Client\EmailVerificationNotificationController;
use App\Http\Controllers\Client\EmailVerificationPromptController;
use App\Http\Controllers\Client\NewPasswordController;
use App\Http\Controllers\Client\PasswordController;
use App\Http\Controllers\Client\PasswordResetLinkController;
use App\Http\Controllers\Client\RegisteredUserController;
use App\Http\Controllers\Client\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['guest:client']],function () {
    Route::get('client/register', [RegisteredUserController::class, 'create'])
                ->name('client.register');

    Route::post('client/register', [RegisteredUserController::class, 'store']);

    Route::get('client/login', [AuthenticatedSessionController::class, 'create'])
                ->name('client.login');

    Route::post('client/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('client/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('client.password.request');

    Route::post('client/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('client/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('client.password.reset');

    Route::post('client/reset-password', [NewPasswordController::class, 'store'])
                ->name('client.password.store');
});

Route::middleware('client')->group(function () {
    Route::get('client/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('client.verification.notice');

    Route::get('client/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('client.verification.verify');

    Route::post('client/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('client.verification.send');

    Route::get('client/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('client.password.confirm');

    Route::post('client/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('client/password', [PasswordController::class, 'update'])->name('client.password.update');
    Route::post('client/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('client.logout');
});
