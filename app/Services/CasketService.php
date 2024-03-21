<?php

namespace App\Services;

interface CasketService {
    public function getCaskets();
    public function storeCasket(array $data);
}
