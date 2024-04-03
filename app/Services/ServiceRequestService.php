<?php

namespace App\Services;

interface ServiceRequestService {

    public function getAllServiceRequests();
    public function getServiceRequestById($id);
    public function createServiceRequest($serviceId);
    public function getConfirmedServiceRequests();
    public function getServiceRequestsByCustomer($id);
    public function cancelServiceRequest($id);
    public function confirmRequest(array $data, $id);
}
