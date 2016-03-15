<?php
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['web']],
    function () {
        // Authentication Routes...
        Route::get('login', 'mp3063\MailActivation\controllers\AuthWithActivationController@showLoginForm');
        Route::post('login', 'mp3063\MailActivation\controllers\AuthWithActivationController@login');
        Route::get('logout', 'mp3063\MailActivation\controllers\AuthWithActivationController@logout');
    
        // Registration Routes...
        Route::get('register', 'mp3063\MailActivation\controllers\AuthWithActivationController@showRegistrationForm');
        Route::post('register', 'mp3063\MailActivation\controllers\AuthWithActivationController@register');
        Route::get('activate', 'mp3063\MailActivation\controllers\AuthWithActivationController@activate');
    
        // Password Reset Routes...
        Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
        Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Auth\PasswordController@reset');
    }
);