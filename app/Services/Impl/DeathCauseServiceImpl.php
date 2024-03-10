<?php

namespace App\Services\Impl;
use App\Models\DeathCause;
use App\Services\DeathCauseService;

class DeathCauseServiceImpl implements DeathCauseService {

    public function getDeathCauses() {
        return DeathCause::all();
    }
}

