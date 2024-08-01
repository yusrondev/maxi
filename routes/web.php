<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CMSController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Yaml\Inline;

Route::get('/', function () {
    return redirect('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // cms
    Route::get('/cms', [CMSController::class, 'index'])->name('cms');
    Route::put('/cms/{id}', [CMSController::class, 'update'])->name('cms.update');
    
    //setting
    Route::get('/settings', [CMSController::class, 'setting'])->name('settings');
    Route::get('/api/users', [CMSController::class, 'getUsers']);
    Route::post('/api/add', [CMSController::class, 'store']);
    Route::put('/api/editUser/{id}', [CMSController::class, 'updateUser']);
    Route::delete('/api/deleteUser/{id}', [CMSController::class, 'destroy']);
    
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //back office
    include __DIR__.'/back-office.php';
});

require __DIR__.'/auth.php';
