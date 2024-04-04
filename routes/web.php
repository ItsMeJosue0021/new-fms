<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CasketController;
use App\Http\Controllers\HearseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DeceasedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformantController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ServiceRequestController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/announcements/latest', 'announcements')->name('announcements');
    Route::get('/announcements/{announcement}/5fIhAl4ugkdK', 'showAnnouncement')->name('announcements.home-show');
    Route::get('/home/caskets', 'caskets')->name('caskets');
});


Route::get('/services/choose-type/{casketId?}', [ServiceTypeController::class, 'index'])->name('services.type');

Route::post('/services/create/{casketId?}', [ServiceController::class, 'store'])->name('services.store');

Route::get('/caskets', [ServiceController::class, 'selctedCasket'])->name('services.caskte');

Route::get('/home/casket/{caskedId}', [HomeController::class, 'selectCasket'])->name('home.select-casket');

Route::get('/unauthorized-access', [UnauthorizedAcceeController::class, 'unauthorizedAccess'])->name('unauthorized-access');


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

    Route::get('/service-request/{request}/{code}', [ServiceRequestController::class, 'QRview'])->name('qrview');

});


Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    Route::controller(ServiceRequestController::class)->group(function () {
       Route::prefix('requests')->group(function () {
            Route::get('/pending', 'index')->name('requests.index');
            Route::get('/confirmed', 'confirmedRequest')->name('requests.confirmed');
            Route::get('/confirmed/{serviceRequestId}', 'confirmedRequestShow')->name('requests.confirmed-show');
            Route::get('/{serviceRequestId}', 'show')->name('requests.show');
            Route::post('/{serviceRequestId}/confirm', 'confirm')->name('requests.confirm');
            Route::get('/{serviceRequestId}/reject', 'reject')->name('requests.reject');
       });

       Route::prefix('customer')->group(function () {
            Route::get('/requests', 'customerRequests')->name('customer.requests');
       });
    });

    Route::prefix('caskets')->group(function () {
        Route::controller(CasketController::class)->group(function () {
            Route::get('', 'index')->name('caskets.index');
            Route::get('/create', 'create')->name('caskets.create');
            Route::post('/store', 'store')->name('caskets.store');
            Route::get('/{casketId}', 'show')->name('caskets.show');
            Route::get('/{casketId}/edit', 'edit')->name('caskets.edit');
            Route::put('/{casketId}', 'update')->name('caskets.update');
            Route::delete('/{casketId}', 'delete')->name('caskets.delete');
            Route::get('/image/{imageId}', 'deleteCasketImage')->name('caskets.delete-image');
        });
    });

    Route::prefix('hearses')->group(function () {
        Route::controller(HearseController::class)->group(function () {
            Route::get('', 'index')->name('hearses.index');
            Route::get('/create', 'create')->name('hearses.create');
            Route::post('/store', 'store')->name('hearses.store');
            Route::get('/{hearse}', 'show')->name('hearses.show');
            Route::get('/{hearse}/edit', 'edit')->name('hearses.edit');
            Route::put('/{hearse}', 'update')->name('hearses.update');
            Route::delete('/{hearse}', 'delete')->name('hearses.delete');
            Route::get('/image/{imageId}', 'deleteHearseImage')->name('hearses.delete-image');
        });
    });

    Route::prefix('announcements')->group(function () {
        Route::controller(AnnouncementController::class)->group(function () {
            Route::get('', 'index')->name('announcements.index');
            Route::get('/create', 'create')->name('announcements.create');
            Route::post('/store', 'store')->name('announcements.store');
            Route::get('/{announcement}', 'show')->name('announcements.show');
            Route::get('/{announcement}/edit', 'edit')->name('announcements.edit');
            Route::put('/{announcement}', 'update')->name('announcements.update');
            Route::delete('/{announcement}', 'delete')->name('announcements.delete');
            Route::get('/image/{imageId}', 'deleteAnnouncementImage')->name('announcements.delete-image');
        });
    });


});

Route::group(['middleware' => ['auth', 'role:customer']], function () {

    Route::controller(ServiceRequestController::class)->group(function () {
        Route::prefix('customer')->group(function () {
            Route::get('/requests', 'customerRequests')->name('customer.requests');
            Route::get('/requests/{request}', 'showCustomerRequest')->name('customer.requests-show');
            Route::get('/requests/{request}/cancel', 'cancel')->name('customer.requests-cancel');
        });
     });

});

require __DIR__ . '/auth.php';
