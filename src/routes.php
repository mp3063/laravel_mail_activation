<?php
Route::group(['middleware' => 'web'], function () {
    // Authentication Routes...
    Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'mp3063\LaravelMailActivation\Controllers\RegisterWithActivation@login');
    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    // Registration Routes...
    Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')
         ->name('register');
    Route::post('register',
        'mp3063\LaravelMailActivation\Controllers\RegisterWithActivation@register');
    Route::get('activate/{code}',
        'mp3063\LaravelMailActivation\Controllers\RegisterWithActivation@getActivate');
    // Password Reset Routes...
    Route::get('password/reset',
        'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')
         ->name('password.request');
    Route::post('password/email',
        'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}',
        'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
});
