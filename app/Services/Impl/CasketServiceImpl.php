<?php

namespace App\Services\Impl;
use App\Models\Casket;
use App\Services\CasketService;

class CasketServiceImpl implements CasketService {

    public function getCaskets() {
        return Casket::orderBy('price', 'desc')->filter(Request(['search']))->paginate(6);
    }
}

