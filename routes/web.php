<?php

use Livewire\Livewire;
use App\Livewire\HomePage;
use App\Livewire\UnitPage;
use App\Livewire\SearchPage;
use App\Livewire\ContactPage;
use App\Livewire\InventoryPage;
use App\Livewire\ConstructionPage;
use App\Livewire\PrivacyPolicyPage;
use Illuminate\Support\Facades\Lang;
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


//Rutas privadas
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


//Rutas públicas
/* Route::localized(function () {

    Route::get('/', HomePage::class)->name('home');
    Route::get(Lang::uri('/condominios-en-venta'), InventoryPage::class)->name('inventory');
    Route::get(Lang::uri('/condominio-en-venta-frente-al-mar').'/{name}', UnitPage::class)->name('unit');
    Route::get(Lang::uri('/buscar-condominios'), SearchPage::class)->name('search');
    Route::get(Lang::uri('/contacta-un-asesor'), ContactPage::class)->name('contact');
    Route::get(Lang::uri('/aviso-de-privacidad'), PrivacyPolicyPage::class)->name('privacy.policy');
    Route::get(Lang::uri('/avances-de-obra'), ConstructionPage::class)->name('construction');

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
}); */

Route::post('/send-email', [PublicPagesController::class, 'sendMail'])->name('send.email');

Route::get('/tridenta-optimize', function() {
    Artisan::call('optimize');
    return ('Optimizado');
});

require __DIR__.'/auth.php';