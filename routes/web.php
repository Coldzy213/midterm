<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;


Route::get('/register',	[RegistrationController::class,	'showForm']);
Route::post('/register',[RegistrationController::class,	'register'])->name('register');
