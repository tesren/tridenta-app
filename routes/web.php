<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPagesController;

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

Route::view('/', 'welcome');

Route::redirect('/', '/login', 302);

Route::get('/dashboard/home', [AdminPagesController::class, 'home'])->middleware(['auth'])->name('dashboard.home');
Route::get('/dashboard/inventory', [AdminPagesController::class, 'inventory'])->middleware(['auth'])->name('dashboard.inventory');

Route::post('/logout', [AdminPagesController::class, 'destroy'])->middleware('auth')->name('logout');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php'; 
