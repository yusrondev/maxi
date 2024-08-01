<?php

use App\Http\Controllers\RoomController;

Route::get('/room', [RoomController::class, 'index']);