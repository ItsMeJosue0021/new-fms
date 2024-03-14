<?php

use App\Http\Controllers\DeceasedController;
use App\Http\Controllers\InformantController;
use App\Http\Controllers\ServiceRequestController;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/services/type', [ServiceTypeController::class, 'index'])->name('services.type');

Route::post('/services/create', [ServiceController::class, 'createService'])->name('services.store');

Route::get('/caskets', [ServiceController::class, 'selctedCasket'])->name('services.caskte');


Route::middleware('auth')->group(function () {

    Route::prefix('/services/{serviceId}')->group(function () {
        Route::controller(ServiceController::class)->group(function () {
            Route::get('', 'cancelServiceCreation')->name('services.cancel');
            Route::get('/inclusions', 'inclusions')->name('services.inclusions');
            Route::post('/inclusions/save', 'saveInclusions')->name('services.save-inclusions');
            Route::get('/caskets', 'caskets')->name('services.caskets');
            Route::get('/caskets/{casket}/select', 'selectCasket')->name('services.caskets-select');
            Route::get('/hearses', 'hearse')->name('services.hearses');
            Route::get('/hearses/{hearse}/select', 'selectHearse')->name('services.hearses-select');
            Route::get('/deceased', 'deceased')->name('services.deceased');
            Route::get('/informant', 'informant')->name('services.informant');
            Route::get('/other-services', 'otherServices')->name('services.other-services');
            Route::post('/other-services/save', 'addOtherServices')->name('services.save-other-services');
            Route::get('/summary', 'summary')->name('services.summary');
            Route::get('/message', 'message')->name('services.message');
        });

        Route::controller(DeceasedController::class)->group(function () {
            Route::post('/deceased', 'store')->name('services.deceased-store');
        });

        Route::controller(InformantController::class)->group(function () {
            Route::post('/informant', 'store')->name('services.informant-store');
        });

        Route::controller(ServiceRequestController::class)->group(function () {
            Route::post('/request/save', 'store')->name('services.request-store');
        });

    });

    Route::prefix('/profile')->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('', 'edit')->name('profile.edit');
            Route::patch('', 'update')->name('profile.update');
            Route::delete('', 'destroy')->name('profile.destroy');
        });
    });

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
