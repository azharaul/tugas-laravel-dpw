<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', [DataController::class, 'index']);
Route::get('/hasil', [DataController::class, 'hasil']);
Route::get('/master-tiket', [DataController::class, 'masterTiket']);
Route::post('/master-tiket/simpan', [DataController::class, 'simpanMaster']);
