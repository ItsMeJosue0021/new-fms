<?php

namespace App\Services\Impl;
use App\Exceptions\ServiceNotFoundException;
use App\Models\Service;
use App\Services\ServiceService;

class ServiceServiceImpl implements ServiceService {

    public function saveService(array $service) {
        $savedService = Service::create([
            'service_type' => $service['service_type']
        ]);
        return $savedService;
    }

    public function deleteService($serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException('Service can not be found');
        }
        $service->delete();
    }
}
