<?php

namespace App\Services;

interface CasketService {
    public function getCaskets();
    public function getCasketById($id);
    public function storeCasket(array $data);
    public function storeCasketImages($images, $casket);
    public function updateCasket(array $data, $id);
    public function deleteCasketImageById($id);
}
