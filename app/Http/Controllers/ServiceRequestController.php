<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceRequestService;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\StorePaymentInforRequest;
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
        try {
            $this->serviceRequestService->createServiceRequest($serviceId);
            return redirect()->route('services.message', $serviceId);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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

    public function customerRequests() {
        return view('customer.requests', [
            'requests' => $this->serviceRequestService->getServiceRequestsByCustomer(auth()->user()->id)
        ]);
    }

    public function showCustomerRequest($id) {
        try {
            $request = $this->serviceRequestService->getServiceRequestById($id);
            return view('customer.show-request', [
            'request' => $request,
            'service' => $request->service
        ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        }
    }

    public function cancel($id) {
        try {
            $this->serviceRequestService->cancelServiceRequest($id);
            return redirect()->route('customer.requests')->with('success', 'Service request has been cancelled');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function QRview($id) {
        try {
            $request = $this->serviceRequestService->getServiceRequestById($id);
            return view('requests.qrview', [
            'request' => $request,
            'service' => $request->service
        ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        }
    }

    public function confirm(StorePaymentInforRequest $request, $requestId) {
        // dd($request->all());
        // try {
            $this->serviceRequestService->confirmRequest($request->validated(), $requestId);
            return redirect()->route('requests.index')->with('success', 'Service request has been confirmed');
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Service request not found');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Something went wrong while trying to confirm the service request');
        // }
    }
}
