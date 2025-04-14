<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\EventController;


Route::get('/', [TemplateController::class,'index']);