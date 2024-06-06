<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Services\ServiceService;
use App\Services\ServiceRequestService;
use App\Http\Requests\StoreServiceRequest;
use App\Exceptions\ServiceNotFoundException;
use App\Http\Requests\StorePaymentInforRequest;
use App\Http\Requests\UpdateBurialIntermentInforRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceRequestController extends Controller
{
    private $serviceRequestService;
    private $serviceService;
    public function __construct(ServiceRequestService $serviceRequestService, ServiceService $serviceService) {
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
            'service' => $request->service,
            'drivers' => Employee::where('type', 'Driver')->get(),
            'helpers' => Employee::where('type', 'Helper')->get()
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

        $confirmedRequests = ServiceRequest::where('status', 'confirmed')->get();

        foreach ($confirmedRequests as $confirmedRequest) {
            $today = date("Y-m-d H:i:s");
            $internment_datetime = $confirmedRequest->service->deceased->deathDetail->internment_date . ' ' . $confirmedRequest->service->deceased->deathDetail->internment_time;
            if (strtotime($internment_datetime) < strtotime($today)) {
                $confirmedRequest->update([
                    'status' => 'completed'
                ]);
            }
        }

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
            return redirect()->route('requests.receipt', $requestId)->with('success', 'Service request has been confirmed');
        // } catch (ModelNotFoundException $e) {
        //     return redirect()->back()->with('error', 'Service request not found');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Something went wrong while trying to confirm the service request');
        // }
    }

    public function completed() {

        $confirmedRequests = ServiceRequest::where('status', 'confirmed')->get();

        foreach ($confirmedRequests as $confirmedRequest) {
            $today = date("Y-m-d H:i:s");
            $internment_datetime = $confirmedRequest->service->deceased->deathDetail->internment_date . ' ' . $confirmedRequest->service->deceased->deathDetail->internment_time;
            if (strtotime($internment_datetime) < strtotime($today)) {
                $confirmedRequest->update([
                    'status' => 'completed'
                ]);
            }
        }

        return view('requests.completed', [
            'requests' => $this->serviceRequestService->getCompletedServiceRequest()
        ]);
    }

    public function completedRequestShow($id) {
        try {
            $request = $this->serviceRequestService->getServiceRequestById($id);
            return view('requests.completed-show', [
                'request' => $request,
                'service' => $request->service
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        }
    }

    public function receipt($requestId) {
            $request = $this->serviceRequestService->getServiceRequestById($requestId);
            return view('requests.receipt', [
            'request' => $request,
            'service' => $request->service
        ]);
    }

    public function markAsCompleted($requestId) {
        try {
            $this->serviceRequestService->markAsCompleted($requestId);
            return redirect()->back()->with('success', 'Service request has been marked as completed');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to mark the service request as completed');
        }
    }

    public function print(Request $request) {

        if ($request->input('from') || $request->input('to')) {
            $from = $request->input('from');
            $to = $request->input('to');

            $requests = ServiceRequest::where('status', 'completed')
                                            ->whereBetween('created_at', [$from, $to])
                                            ->get();

            return view('requests.print-completed', [
                'requests' => $requests,
                'total' => $requests->sum('total_amount')
            ]);

        } else {
            $requests = ServiceRequest::where('status', 'completed')->latest()->get();
            return view('requests.print-completed', [
                'requests' => $requests ,
                'total' => $requests->sum('total_amount')
            ]);
        }
    }

    public function addEditBurialIntermentInfo($requestId) {
        try {
            $request = $this->serviceRequestService->getServiceRequestById($requestId);
            return view('requests.add_edit_burial_interment_info', [
                'request' => $request,
                'service' => $request->service
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        }
    }

    public function updateBurialIntermentInfo(UpdateBurialIntermentInforRequest $request, $requestId) {
        try {
            $this->serviceRequestService->updateBurialIntermentInfo($request->validated(), $requestId);
            return redirect()->back()->with('success', 'Burial/Interment information has been updated');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Service request not found');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to update the burial/interment information');
        }
    }

}
