<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ComputerController;

// Thay dòng Route::get cũ bằng dòng này:
Route::resource('computers', ComputerController::class);
Route::resource('issues', IssueController::class);

Route::get('/', function () {
    return view('welcome');
});
