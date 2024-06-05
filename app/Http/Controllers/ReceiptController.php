<?php

namespace App\Http\Controllers;


use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use App\Services\ServiceRequestService;

class ReceiptController extends Controller
{
    private $serviceRequestService;

    public function __construct(ServiceRequestService $serviceRequestService)
    {
        $this->serviceRequestService = $serviceRequestService;
    }
    public function index($requestId)
    {
        $request = $this->serviceRequestService->getServiceRequestById($requestId);
        return Pdf::view('requests.receipt', ['request' => $request, 'service' => $request->service])
        ->format('a4')
        ->name('your-invoice.pdf');
    }
}
