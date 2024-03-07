<?php

namespace App\Services;

interface ServiceService {
    public function getServiceById($serviceId);
    public function saveService(array $data);
    public function deleteService($serviceId);
    public function setGallonsOfWater(array $data, $serviceId);
    public function casketIsSet($serviceId);
    public function hearseIsSet($serviceId);
}
