<?php
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['web']],
    function () {
        Route::auth();
    }
);