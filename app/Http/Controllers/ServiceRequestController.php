<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceRequestService;
use App\Http\Requests\StoreServiceRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceRequestController extends Controller
{
    private $serviceRequestService;
    public function __construct(ServiceRequestService $serviceRequestService) {
        $this->serviceRequestService = $serviceRequestService;
    }

    public function index() {
        return view('requests.index', [
            'requests' => $this->serviceRequestService->getAllServiceRequests()
        ]);
    }

    public function show($id) {
        try {
            $request = $this->serviceRequestService->getServiceRequestById($id);
            return view('requests.show', [
            'request' => $request,
            'service' => $request->service
        ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        }
    }

    public function store($serviceId) {
        $this->serviceRequestService->createServiceRequest($serviceId);
        return redirect()->route('services.message', $serviceId);
    }

    public function confirmedRequest() {
        return view('requests.confirmed', [
            'requests' => $this->serviceRequestService->getConfirmedServiceRequests()
        ]);
    }

    public function confirmedRequestShow($id) {
        try {
            $request = $this->serviceRequestService->getServiceRequestById($id);
            return view('requests.confirmed-show', [
            'request' => $request,
            'service' => $request->service
        ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        }
    }
}
