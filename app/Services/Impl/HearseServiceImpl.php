<?php

namespace App\Services\Impl;
use App\Models\Casket;
use App\Models\Hearse;
use App\Services\HearseService;

class HearseServiceImpl implements HearseService {

    public function getHearses() {
        return Hearse::filter(Request(['search']))->paginate(6);
    }
}

