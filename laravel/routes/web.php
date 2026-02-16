<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [MovieController::class, 'index'])->name('movie.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return "¡Bienvenido, administrador!";
})->middleware('admin');


Route::middleware('auth')->group(function () {
    Route::resource('movies', MovieController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('perfil', [ProfileController::class, 'index'])
        ->name('profile.index');
});


require __DIR__.'/auth.php';
