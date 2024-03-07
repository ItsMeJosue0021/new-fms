<?php

namespace App\Services\Impl;
use App\Exceptions\ServiceNotFoundException;
use App\Http\Requests\SetGallonOfWaterRequest;
use App\Models\Service;
use App\Services\ServiceService;

class ServiceServiceImpl implements ServiceService {

    private $serviceCannotBeFoundMessage = 'Service can not be found';

    public function getServiceById($serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceCannotBeFoundMessage);
        }
        return $service;
    }

    public function saveService(array $service) {
        $savedService = Service::create([
            'service_type' => $service['service_type']
        ]);
        return $savedService;
    }

    public function deleteService($serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceCannotBeFoundMessage);
        }
        $service->delete();
    }

    public function setGallonsOfWater($request, $serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceCannotBeFoundMessage);
        }
        return $service->update(['water' => $request['water']]);
    }

    public function casketIsSet($serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceCannotBeFoundMessage);
        }
        return $service->casket_id !== null;
    }

    public function hearseIsSet($serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceCannotBeFoundMessage);
        }
        return $service->hearse_id !== null;
    }


}
