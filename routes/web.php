<?php

use App\Http\Controllers\OutfitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/outfits', [OutfitController::class, 'index'])->name('outfits.index');
Route::post('/outfits', [OutfitController::class, 'store'])->name('outfits.store');
Route::get('/outfits/create', [OutfitController::class, 'create'])->name(name: 'outfits.create');
Route::get('/outfits/{outfit}', [OutfitController::class, 'show'])->name(name: 'outfits.show');
Route::delete('/outfits/{outfit}', [OutfitController::class, 'destroy'])->name('outfits.destroy');

require __DIR__ . '/auth.php';
