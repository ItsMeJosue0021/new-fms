<?php

namespace App\Services\Impl;

use App\Models\Religion;
use App\Services\ReligionService;

class ReligionServiceImpl implements ReligionService {
    public function getReligions() {
        return Religion::all();
    }
}
