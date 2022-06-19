<?php

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group([
    'prefix' => 'profile',
    'as' => 'profile.',
    'namespace' => 'Auth',
    'middleware' => ['auth']
], function () {
    Route::get('password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'edit'])
        ->name('password.edit');
    Route::post('password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'update'])
        ->name('password.update');
    Route::post('profile', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'updateProfile'])
        ->name('password.updateProfile');
});

Route::view('home','home')->middleware('auth'); // giusto il login mi basta per andare in home
