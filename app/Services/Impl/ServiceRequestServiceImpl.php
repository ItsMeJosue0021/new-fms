<?php

namespace App\Services\Impl;

use App\Exceptions\ServiceRequestNotFoundException;
use App\Models\ServiceRequest;
use App\Services\ServiceRequestService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceRequestServiceImpl implements ServiceRequestService {
    public function createServiceRequest($serviceId) {
        return ServiceRequest::create($this->toServiceRequestArray($serviceId));
    }

    public function getAllServiceRequests() {
        return ServiceRequest::latest()->paginate(2);
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
}
