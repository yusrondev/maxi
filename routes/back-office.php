<?php

use App\Http\Controllers\RoomController;

Route::get('/room', [RoomController::class, 'index']);
Route::post('/room/store', [RoomController::class, 'store']);
Route::post('/room/{id}', [RoomController::class, 'update']);
Route::post('/room/delete/{id}', [RoomController::class, 'delete']);

// room chat
Route::get('/room/chat/{code}', [RoomController::class, 'roomchat']);
