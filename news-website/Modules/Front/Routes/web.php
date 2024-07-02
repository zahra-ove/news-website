<?php

use Illuminate\Support\Facades\Route;

Route::get('/front-test', [\Modules\Front\Http\Controllers\FrontController::class, 'index']);
