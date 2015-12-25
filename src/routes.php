<?php
use Illuminate\Support\Facades\Route;

Route::group( [ 'middleware' => [ 'web' ] ], function () {
    Route::controllers( [ 'auth' => 'mp3063\MailActivation\controllers\AuthWithActivationController', ] );
} );