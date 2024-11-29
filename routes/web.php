<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('alumnos', AlumnosController::class);
