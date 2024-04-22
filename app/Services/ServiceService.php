<?php

namespace App\Services;

interface ServiceService {
    public function getServiceById($serviceId);
    public function saveService(array $data);
    public function cancelService($serviceId);
    public function deleteService($serviceId);
    public function setGallonsOfWater(array $data, $serviceId);
    public function casketIsSet($serviceId);
    public function hearseIsSet($serviceId);
    public function setCasket($serviceId, $casketId);
    public function setHearse($serviceId, $hearseId);
    public function setDeceased($serviceId, $deceasedId);
    public function setInformant($serviceId, $informantId);
    public function setOtherServices($serviceId, array $data);
    public function setUrn($serviceId, $urnId);
}
