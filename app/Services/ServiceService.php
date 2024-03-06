<?php

namespace App\Services;

interface ServiceService {
    public function saveService(array $service);
    public function deleteService($serviceId);
}
