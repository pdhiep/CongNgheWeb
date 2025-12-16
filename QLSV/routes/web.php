<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThesesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('theses', ThesesController::class);
