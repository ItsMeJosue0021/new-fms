<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\UnauthorizedAcceeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/services/type', [ServiceTypeController::class, 'index'])->name('services.type');

Route::post('/services/create', [ServiceController::class, 'createService'])->name('services.store');

Route::get('/caskets', [ServiceController::class, 'selctedCasket'])->name('services.caskte');

Route::prefix('/services/{serviceId}')->group(function () {
    Route::controller(ServiceController::class)->group(function () {
        Route::get('', 'cancelServiceCreation')->name('services.cancel');
        Route::get('/inclusions', 'inclusions')->name('services.inclusions');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/unauthorized-access', [UnauthorizedAcceeController::class, 'unauthorizedAccess'])->name('unauthorized-access');

Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::get('/admin', function () {
        return view('admin-dashboard');
    })->name('admin.dashboard');

});

Route::group(['middleware' => ['auth', 'role:customer']], function () {

    Route::get('/customer', function () {
        return view('customer-dashboard');
    })->name('customer.dashboard');

});

require __DIR__.'/auth.php';
