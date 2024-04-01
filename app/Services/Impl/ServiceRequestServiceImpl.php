<?php

namespace App\Services\Impl;

use App\Models\ServiceRequest;
use App\Services\ServiceRequestService;

class ServiceRequestServiceImpl implements ServiceRequestService {
    public function createServiceRequest($serviceId) {
        return ServiceRequest::create($this->toServiceRequestArray($serviceId));
    }

    public function getAllServiceRequests() {
        return ServiceRequest::where('status', 'pending')->latest()->paginate(2);
    }

    public function getServiceRequestById($id) {
        return ServiceRequest::findOrFail($id);
    }

    public function toServiceRequestArray($serviceId) {

        $user_id = auth()->user()->id;

        return [
            'service_id' => $serviceId,
            'user_id' => $user_id,
            'status' => 'pending'
        ];
    }

    public function getConfirmedServiceRequests() {
        return ServiceRequest::where('status', 'confirmed')->paginate(10);
    }

    public function getServiceRequestsByCustomer($id) {
        return ServiceRequest::where('user_id', $id)->latest()->paginate(10);
    }

    public function cancelServiceRequest($id) {
        $serviceRequest = ServiceRequest::findOrFail($id);

        if ($serviceRequest->status === 'confirmed') {
            throw new \Exception('Cannot cancel a confirmed or completed service request');
        }

        return $serviceRequest->update([
            'status' => 'cancelled'
        ]);

    }
}
