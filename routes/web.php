<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/submit', [SubmissionController::class, 'submit']);
