<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;

Route::get('/', [TemplateController::class,'index']);

Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout']);