<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ($id) {
    echo 'hello';
});

Route::apiResource('activity', ActivityController::class);

