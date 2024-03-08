<?php

namespace App\Services\Impl;
use App\Models\Casket;
use App\Models\Hearse;
use App\Models\Service;
use App\Services\ServiceService;
use App\Exceptions\CasketNotFoundException;
use App\Exceptions\HearseNotFoundException;
use App\Exceptions\ServiceNotFoundException;
use App\Http\Requests\SetGallonOfWaterRequest;

class ServiceServiceImpl implements ServiceService {

    private $serviceNotBeFoundMessage = 'Service can not be found';

    public function getServiceById($serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceNotBeFoundMessage);
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
            throw new ServiceNotFoundException($this->serviceNotBeFoundMessage);
        }
        $service->delete();
    }

    public function setGallonsOfWater($request, $serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceNotBeFoundMessage);
        }
        return $service->update(['water' => $request['water']]);
    }

    public function casketIsSet($serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceNotBeFoundMessage);
        }
        return $service->casket_id !== null;
    }

    public function hearseIsSet($serviceId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceNotBeFoundMessage);
        }
        return $service->hearse_id !== null;
    }

    public function setCasket($serviceId, $casketId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceNotBeFoundMessage);
        }

        $casket = Casket::find($casketId);
        if (!$casket) {
            throw new CasketNotFoundException('Casket can not be found');
        }

        return $service->update(['casket_id' => $casketId]);
    }

    public function setHearse($serviceId, $hearseId) {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceNotBeFoundMessage);
        }

        $hearse = Hearse::find($hearseId);
        if (!$hearse) {
            throw new HearseNotFoundException('Hearse can not be found');
        }

        return $service->update(['hearse_id' => $hearseId]);
    }


}
