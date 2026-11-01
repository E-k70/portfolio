<?php

use App\Http\Controllers\AdminOutfitController;
use App\Http\Controllers\OutfitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/outfits');
/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/outfits', [OutfitController::class, 'index'])->name('outfits.index');

Route::middleware('auth')->group(function () {
    Route::get('/outfits/create', [OutfitController::class, 'create'])->name('outfits.create')->can('create-outfit');
    Route::post('/outfits', [OutfitController::class, 'store'])->name('outfits.store')->can('create-outfit');
    Route::get('/outfits/{outfit}/edit', [OutfitController::class, 'edit'])->name('outfits.edit');
    Route::put('/outfits/{outfit}', [OutfitController::class, 'update'])->name('outfits.update');
    Route::delete('/outfits/{outfit}', [OutfitController::class, 'destroy'])->name('outfits.destroy');
    Route::post('/outfits/{outfit}/like', [OutfitController::class, 'toggleLike'])->name('outfits.like');

});
Route::get('/outfits/{outfit}', [OutfitController::class, 'show'])->name('outfits.show');

Route::middleware(['auth', 'can:admin'])->name('admin.')->group(function () {
    Route::redirect('/admin', '/admin/outfits');
    Route::get('/admin/outfits', [AdminOutfitController::class, 'index'])->name('outfits.index');
    Route::patch('/admin/outfits/{outfit}/toggle', [AdminOutfitController::class, 'toggle'])->name('outfits.toggle');
});


require __DIR__ . '/auth.php';
