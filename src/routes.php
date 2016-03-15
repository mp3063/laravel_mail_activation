<?php
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['web']],
    function () {
        Route::resource(
            'auth',
            'mp3063\MailActivation\controllers\AuthWithActivationController'
        );
    }
);