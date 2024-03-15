<?php

namespace App\Services;

interface ServiceRequestService {

    public function getAllServiceRequests();

    public function createServiceRequest($serviceId);

}
