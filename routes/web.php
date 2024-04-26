<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\PublicPagesController;

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

//Route::view('/', 'welcome');

Route::redirect('/', '/login', 302);
Route::redirect('/dashboard', '/dashboard/home', 301);

Route::get('/dashboard/home', [AdminPagesController::class, 'home'])->middleware(['auth'])->name('dashboard.home');
Route::get('/dashboard/inventory', [AdminPagesController::class, 'inventory'])->middleware(['auth'])->name('dashboard.inventory');
Route::get('/dashboard/search', [AdminPagesController::class, 'search'])->middleware(['auth'])->name('dashboard.search');
Route::get('/dashboard/inventory/unit/{id}', [AdminPagesController::class, 'unit'])->middleware(['auth'])->name('dashboard.unit');
Route::get('/dashboard/saved-units/{id}', [AdminPagesController::class, 'saved'])->middleware(['auth'])->name('dashboard.saved.units');
Route::get('/dashboard/profile', [AdminPagesController::class, 'profile'])->middleware(['auth'])->name('dashboard.profile');

Route::post('/dashboard/save-unit', [AdminPagesController::class, 'addSavedUnit'])->name('user.store.unit');
Route::delete('/dashboard/remove-unit/{id}', [AdminPagesController::class, 'removeSavedUnit'])->name('user.delete.unit');


Route::post('/logout', [AdminPagesController::class, 'destroy'])->middleware('auth')->name('logout');
/* 
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile'); */

Route::post('/send-email', [PublicPagesController::class, 'sendMail'])->name('send.email');

Route::get('/tridenta-optimize', function() {
    Artisan::call('optimize');
    return ('Optimizado');
});

require __DIR__.'/auth.php'; 
