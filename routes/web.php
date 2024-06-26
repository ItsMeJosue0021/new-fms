<?php

use App\Models\PaymentTerm;
use App\Models\CondolencesMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrnController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CasketController;
use App\Http\Controllers\HearseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DeceasedController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformantController;
use App\Http\Controllers\PaymentTermController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\JsonResponseController;
use App\Http\Controllers\OtherServiceController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\DeceasedDocumentController;
use App\Http\Controllers\UnauthorizedAcceeController;
use App\Http\Controllers\CondolencesMessageController;

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

Route::controller(JsonResponseController::class)->group(function () {
    Route::get('/json/caskets', 'caskets')->name('json.caskets');

});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/announcements/latest', 'announcements')->name('announcements');
    Route::get('/announcements/{announcement}/5fIhAl4ugkdK', 'showAnnouncement')->name('announcements.home-show');
    Route::get('/home/caskets', 'caskets')->name('caskets');
});


Route::controller(MessageController::class)->group(function () {
    Route::prefix('messages')->group(function () {
        Route::get('/', 'index')->name('message.index');
        Route::post('/store', 'store')->name('message.store');
        Route::delete('/{message}/delete', 'delete')->name('message.delete');
        Route::get('/{message}', 'show')->name('message.show');
    });
});


Route::get('/services/choose-type/{casketId?}', [ServiceTypeController::class, 'index'])->name('services.type');

Route::post('/services/create/{casketId?}', [ServiceController::class, 'store'])->name('services.store');

Route::get('/caskets', [ServiceController::class, 'selctedCasket'])->name('services.caskte');

Route::get('/home/casket/{caskedId}', [HomeController::class, 'selectCasket'])->name('home.select-casket');

Route::get('/404', [UnauthorizedAcceeController::class, 'unauthorizedAccess'])->name('unauthorized-access');


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
            Route::get('/documents', 'otherServices')->name('services.other-services');
            Route::post('/other-services/save', 'addOtherServices')->name('services.save-other-services');
            Route::get('/summary', 'summary')->name('services.summary');
            Route::get('/payment-terms', 'paymentTerms')->name('services.payment-terms');
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

        Route::controller(DeceasedDocumentController::class)->group(function () {
            Route::post('/documents/save', 'store')->name('services.documents-store');
            Route::delete('/documents/{document}/delete', 'delete')->name('services.documents-delete');
            Route::get('/redirect', 'redirectFromDocuments')->name('services.documents-redirect');
        });

        Route::controller(OtherServiceController::class)->group(function () {
            Route::get('/{request}/9fN3tBa/others', 'create')->name('services.other-services-create');
            Route::post('/others/save', 'store')->name('services.other-services-store');
            Route::get('/others/{otherService}/delete', 'delete')->name('services.other-services-delete');
        });
    });

    Route::prefix('/profile')->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('8hdjDFJ9s', 'editUserProfile')->name('profile.edit-user');
            Route::get('', 'editAdminProfile')->name('profile.edit-admin');
            Route::put('/{userId}/JY65gJS0h}', 'update')->name('profile.update');
            Route::delete('', 'destroy')->name('profile.destroy');
        });
    });

    Route::get('/service-request/{request}/{code}', [ServiceRequestController::class, 'QRview'])->name('qrview');

    Route::get('requests/{serviceRequestId}/T1uV3w6Y/receipt', [ServiceRequestController::class, 'receipt'])->name('requests.receipt');

    Route::get('/request/{request}/receipt',[ReceiptController::class, 'index'] )->name('requests.receipt-spattie');

});


Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    Route::controller(ServiceRequestController::class)->group(function () {
        Route::prefix('requests')->group(function () {
            Route::get('/pending', 'index')->name('requests.index');
            Route::get('/confirmed', 'confirmedRequest')->name('requests.confirmed');
            Route::get('/completed', 'completed')->name('requests.completed');
            Route::get('/confirmed/{serviceRequestId}/aB3dE9Z2', 'confirmedRequestShow')->name('requests.confirmed-show');
            Route::get('/completed/{serviceRequestId}/4fT6rD1u', 'completedRequestShow')->name('requests.completed-show');
            Route::get('/{serviceRequestId}/H7kL2v9Q', 'show')->name('requests.show');
            Route::post('/{serviceRequestId}/M3nV5j7R/confirm', 'confirm')->name('requests.confirm');
            Route::get('/{serviceRequestId}/y2G6hK8l/reject', 'reject')->name('requests.reject');
            Route::get('/{serviceRequestId}/E3gH6j9K/complete', 'markAsCompleted')->name('requests.complete');
            Route::get('/completed/print', 'print')->name('requests.print-completed');
            Route::get('/{serviceRequestId}/interment-info/edit', 'addEditBurialIntermentInfo')->name('add-edit-burial-interment-info');
            Route::post('/{serviceRequestId}/interment-info/update', 'updateBurialIntermentInfo')->name('update-burial-interment-info');
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

    Route::controller(FeedbackController::class)->group(function () {
        Route::get('/feedbacks', 'index')->name('feedback.index');
        Route::get('/feedbacks/{feedback}/visible', 'visible')->name('feedback.visible');
        Route::get('/feedbacks/{feedback}/hide', 'hidden')->name('feedback.hidden');
        Route::delete('/feedbacks/{feedback}', 'delete')->name('feedback.delete');
    });

    Route::controller(UrnController::class)->group(function () {
        Route::prefix('urns')->group(function () {
            Route::get('', 'index')->name('urns.index');
            Route::get('/create', 'create')->name('urns.create');
            Route::post('/store', 'store')->name('urns.store');
            // Route::get('/{urn}', 'show')->name('urns.show');
            Route::get('/{urn}/edit', 'edit')->name('urns.edit');
            Route::put('/{urn}', 'update')->name('urns.update');
            Route::delete('/{urn}', 'delete')->name('urns.delete');
            Route::get('/image/{imageId}', 'deleteUrnImage')->name('urns.delete-image');
        });
    });

    Route::controller(EmployeeController::class)->group(function () {
        Route::prefix('employees')->group(function () {
            Route::get('', 'index')->name('employees.index');
            Route::get('/create', 'create')->name('employees.create');
            Route::post('/store', 'store')->name('employees.store');
            Route::get('/{employee}', 'show')->name('employees.show');
            Route::get('/{employee}/edit', 'edit')->name('employees.edit');
            Route::put('/{employee}', 'update')->name('employees.update');
            Route::delete('/{employee}', 'delete')->name('employees.delete');
            Route::get('/{employee}/delete-image', 'deleteImage')->name('employees.delete-image');
        });
    });

    Route::controller(CondolencesMessageController::class)->group(function () {
        Route::prefix('condolences')->group(function () {
            Route::get('', 'index')->name('condolences-message.index');
            Route::put('/{message}/update', 'update')->name('condolences-message.update');
        });
    });

    Route::controller(PaymentTermController::class)->group(function () {
        Route::prefix('payment-terms')->group(function () {
            Route::get('', 'index')->name('payment-terms.index');
            Route::put('/{message}/update', 'update')->name('payment-terms.update');
        });
    });

});

Route::group(['middleware' => ['auth', 'role:customer']], function () {

    Route::controller(ServiceRequestController::class)->group(function () {
        Route::prefix('customer')->group(function () {
            Route::get('/requests', 'customerRequests')->name('customer.requests');
            Route::get('/requests/{request}', 'showCustomerRequest')->name('customer.requests-show');
            Route::get('/requests/{request}/cancel', 'cancel')->name('customer.requests-cancel');
            // Route::get('/requests/{service}/edit', 'requestEdit')->name('customer.request-edit');
        });
    });

    Route::controller(FeedbackController::class)->group(function () {
        Route::post('/feedback/{service_request_id}/save', 'store')->name('feedback.store');
    });

    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services/{serviceId}/delete', 'deleteService')->name('services.delete');
    });

});

require __DIR__ . '/auth.php';
