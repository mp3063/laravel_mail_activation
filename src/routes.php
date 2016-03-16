<?php
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['web']],
    function () {
        // Authentication Routes...
        Route::get('login', 'mp3063\MailActivation\controllers\AuthWithActivationController@showLoginForm');
        Route::post('login', 'mp3063\MailActivation\controllers\AuthWithActivationController@postLogin');
        Route::get('logout', 'mp3063\MailActivation\controllers\AuthWithActivationController@getLogout');
    
        // Registration Routes...
        Route::get('register', 'mp3063\MailActivation\controllers\AuthWithActivationController@showRegistrationForm');
        Route::post('register', 'mp3063\MailActivation\controllers\AuthWithActivationController@postRegister');
        Route::get('activate/{code}', 'mp3063\MailActivation\controllers\AuthWithActivationController@getActivate');
    
        // Password Reset Routes...
        Route::get('password/reset/{token?}', 'App\Http\Controllers\Auth\PasswordController@showResetForm');
        Route::post('password/email', 'App\Http\Controllers\Auth\PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'App\Http\Controllers\Auth\PasswordController@reset');
    }
);