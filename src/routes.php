<?php
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['web']],
    function () {
        Route::get(
            '/register',
            ['as'   => 'register',
             'uses' => 'mp3063\MailActivation\controllers\AuthWithActivationController@getRegister',
            ]
        );
        Route::post(
            '/register',
            ['as'   => 'register',
             'uses' => 'mp3063\MailActivation\controllers\AuthWithActivationController@postRegister',
            ]
        );
        Route::get(
            '/login',
            ['as'   => 'login',
             'uses' => 'mp3063\MailActivation\controllers\AuthWithActivationController@getLogin',
            ]
        );
        Route::post(
            '/login',
            ['as'   => 'login',
             'uses' => 'mp3063\MailActivation\controllers\AuthWithActivationController@postLogin',
            ]
        );
        Route::get(
            '/logout',
            ['as'   => 'logout',
             'uses' => 'mp3063\MailActivation\controllers\AuthWithActivationController@getLogout',
            ]
        );
        Route::get(
            '/forgot',
            ['as'   => 'forgot',
             'uses' => 'mp3063\MailActivation\controllers\AuthWithActivationController@getLogin',
            ]
        );
        Route::post(
            '/forgot',
            ['as'   => 'forgot',
             'uses' => 'mp3063\MailActivation\controllers\AuthWithActivationController@postLogin',
            ]
        );
    }
);