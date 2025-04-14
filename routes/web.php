<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\EventController;


// Web routing
Route::get('/', [TemplateController::class,'index']);
Route::get('/profile', [TemplateController::class,'profile']);

// user handling
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout']);