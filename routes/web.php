<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\propertyController;


// Web routing
Route::get('/', [TemplateController::class,'index']);
Route::get('/profile', [TemplateController::class,'profile']);
Route::get('/property', [TemplateController::class,'property']);
Route::get('/event', [TemplateController::class,'event']);
Route::get('/property-list', [TemplateController::class, 'propertyList'])->name('propertyList');
Route::get('/properties/{id}', [PropertyController::class, 'propertyDetails'])->name('propertyDetails');
Route::get('/users', [TemplateController::class, 'userList'])->name('userList');
Route::get('/user/{id}', [UserController::class, 'show'])->name('userProfile');
// Route::get('/users', [TemplateController::class, 'userList']);
Route::get('/loginview', [TemplateController::class,'loginview']);
Route::get('/registerview', [TemplateController::class,'registerview']);


// user handling
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/register', [UserController::class,'registerweb']); //register, registerweb