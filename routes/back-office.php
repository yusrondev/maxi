<?php

use App\Http\Controllers\RoomController;

Route::get('/room', [RoomController::class, 'index']);
Route::get('/room/pending-chat/{id}', [RoomController::class, 'pendingchat']);
Route::get('/room/approve-chat/{id}', [RoomController::class, 'approvechat']);
Route::post('/room/store', [RoomController::class, 'store']);
Route::post('/room/{id}', [RoomController::class, 'update']);
Route::post('/room/delete/{id}', [RoomController::class, 'delete']);
