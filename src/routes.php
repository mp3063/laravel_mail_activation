<?php
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['web']],
    function () {
        // Authentication Routes...
        Route::get('login', 'mp3063\MailActivation\controllers\AuthWithActivationController@showLoginForm');
        Route::post('login', 'mp3063\MailActivation\controllers\AuthWithActivationController@postLogin');
        Route::post('logout', 'mp3063\MailActivation\controllers\AuthWithActivationController@logout');
    
        // Registration Routes...
        Route::get('register', 'mp3063\MailActivation\controllers\AuthWithActivationController@showRegistrationForm');
        Route::post('register', 'mp3063\MailActivation\controllers\AuthWithActivationController@postRegister');
        Route::get('activate/{code}', 'mp3063\MailActivation\controllers\AuthWithActivationController@getActivate');
    
        // Password Reset Routes...
        Route::get('password/reset/{token?}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm');
        Route::get('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
    }
);
