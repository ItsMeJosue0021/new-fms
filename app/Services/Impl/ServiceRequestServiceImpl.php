<?php

namespace App\Services\Impl;

use App\Models\ServiceRequest;
use App\Services\ServiceRequestService;

class ServiceRequestServiceImpl implements ServiceRequestService {
    public function createServiceRequest($serviceId) {
        return ServiceRequest::create($this->toServiceRequestArray($serviceId));
    }

    public function toServiceRequestArray($serviceId) {

        $user_id = auth()->user()->id;

        return [
            'service_id' => $serviceId,
            'user_id' => $user_id,
            'status' => 'pending'
        ];
    }
}
