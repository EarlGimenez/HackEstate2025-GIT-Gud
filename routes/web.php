<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\EventController;


// Web routing
Route::get('/', [TemplateController::class,'index']);
Route::get('/profile', [TemplateController::class,'profile']);
Route::get('/property', [TemplateController::class,'property']);
Route::get('/event', [TemplateController::class,'event']);
Route::get('/property-list', [TemplateController::class, 'propertyList']);
Route::get('/users', [TemplateController::class, 'userList']);
Route::get('/loginview', [TemplateController::class,'loginview']);
Route::get('/registerview', [TemplateController::class,'registerview']);
Route::get('/map', [TemplateController::class,'map']);

// user handling
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/register', [UserController::class,'registerweb']); 