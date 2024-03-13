<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use Illuminate\Http\Request;
use App\Services\ServiceRequestService;

class ServiceRequestController extends Controller
{
    private $serviceRequestService;
    public function __construct(ServiceRequestService $serviceRequestService) {
        $this->serviceRequestService = $serviceRequestService;
    }
    public function store($serviceId) {
        $this->serviceRequestService->createServiceRequest($serviceId);
        return redirect()->route('services.message', $serviceId);
    }
}
