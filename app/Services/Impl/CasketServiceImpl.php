<?php

namespace App\Services\Impl;
use App\Models\Casket;
use App\Services\FileService;
use App\Services\CasketService;

class CasketServiceImpl implements CasketService {

    private $fileService;

    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
    }

    public function getCaskets() {
        return Casket::orderBy('price', 'desc')->filter(Request(['search']))->paginate(6);
    }

    public function storeCasket(array $data) {
        return Casket::create($this->toCasketArray($data));
    }

    public function toCasketArray(array $data): array {
        return [
            'name' => $data['name'],
            'description' => $data['name'],
            'image' => $this->fileService->saveImage($data['image'], 'caskets'),
            'price' => $data['name'],
            'quantity' => $data['name']
        ];
    }

}

