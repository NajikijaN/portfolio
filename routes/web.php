<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/contact', ContactController::class)
    ->middleware('throttle:contact')
    ->name('contact.send');