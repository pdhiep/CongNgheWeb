<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;

Route::resource('medicines', MedicineController::class);

Route::get('/', function () {
    return view('welcome');
});
