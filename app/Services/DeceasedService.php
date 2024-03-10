<?php

namespace App\Services;

interface DeceasedService
{
    public function saveDeceasedPersonalInfo(array $data);
    public function saveDeceasedAddress(array $data, $id);
    public function saveDeathDetails(array $data, $id);

}
