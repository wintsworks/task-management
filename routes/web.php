<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::get('/edit/{id}', [TaskController::class, 'edit']);
Route::get('/create', [TaskController::class, 'create']);
Route::delete('/destroy/{id}', [TaskController::class, 'destroy']);
Route::post('/create-task', [TaskController::class, 'store']);
Route::post('/update-order', [TaskController::class, 'orderUpdate']);
Route::post('/update-task/{id}', [TaskController::class, 'update']);