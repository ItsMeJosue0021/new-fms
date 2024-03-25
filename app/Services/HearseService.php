<?php

namespace App\Services;

interface HearseService {
    public function getHearses();
    public function createHearse(array $data);
}
