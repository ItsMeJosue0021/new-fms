<?php

namespace App\Services;

interface HearseService {
    public function getHearses();
    public function getHearseById($id);
    public function createHearse(array $data);
    public function updateHearse(array $data, $id);
    public function deleteHearseImageById($hearse);
    public function deleteHearse($id);
}
