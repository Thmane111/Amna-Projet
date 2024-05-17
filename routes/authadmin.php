<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\ConfirmablePasswordController;
use App\Http\Controllers\Admin\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\EmailVerificationPromptController;
use App\Http\Controllers\Admin\NewPasswordController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\PasswordResetLinkController;
use App\Http\Controllers\Admin\RegisteredUserController;
use App\Http\Controllers\Admin\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['guest:admin']],function () {
    Route::get('admin/register', [RegisteredUserController::class, 'create'])
                ->name('admin.register');

    Route::post('admin/register', [RegisteredUserController::class, 'store']);

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('admin.password.request');

    Route::post('Admin/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('Admin/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.password.reset');

    Route::post('Admin/reset-password', [NewPasswordController::class, 'store'])
                ->name('admin.password.store');
});

Route::middleware('admin')->group(function () {
    Route::get('Admin/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('admin.verification.notice');

    Route::get('Admin/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

    Route::post('Admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('admin.verification.send');

    Route::get('Admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('admin.password.confirm');

    Route::post('Admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/password', [PasswordController::class, 'update'])->name('admin.password.update');
    Route::get('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('admin.logout');
});
