<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\WineController as AdminWineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])
    ->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::resource('wines', AdminWineController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware(['auth', 'verified'])
//     ->prefix('admin')->name('admin.')->group(function () {
//         Route::get('/', [DashboardController::class, 'index'])->name('home');
//         Route::resource('beers', BeerController::class);
//         Route::resource('clients', ClientController::class);
//         Route::resource('store_types', StoreTypeController::class);
//         Route::get('category-filter/{category}', [BeerController::class, 'categoryFilter'])->name('category.filter');
//         Route::patch('modify-pieces/{beer}', [BeerController::class, 'modifyPieces'])->name('modify-pieces');
//     });


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// require __DIR__ . '/auth.php';
