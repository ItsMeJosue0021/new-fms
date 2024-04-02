<?php

namespace App\Services\Impl;
use App\Models\Casket;
use App\Models\CasketImage;
use App\Services\FileService;
use App\Services\CasketService;

class CasketServiceImpl implements CasketService {

    private $fileService;

    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
    }

    public function getCaskets() {
        return Casket::orderBy('price', 'desc')->filter(Request(['search']))->paginate(7);
    }

    public function getCasketById($id) {
        return Casket::findOrFail($id);
    }

    public function storeCasket(array $data) {
        $casket =  Casket::create($this->toCasketArray($data));

        if (!empty($data['images'])) {
            $this->storeCasketImages($data['images'], $casket);
        }
    }

    public function updateCasket(array $data, $id) {
        $casket = Casket::findOrFail($id);
        $casket->update($this->toCasketArray($data));

        if (!empty($data['images'])) {
            $this->storeCasketImages($data['images'], $casket);
        }
    }

    public function deleteCasketImageById($casket) {
        return CasketImage::findOrFail($casket)->delete();
    }

    public function deleteHearse($casket) {
        return Casket::findOrFail($casket)->delete();
    }

    public function toCasketArray(array $data): array {
        return [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity']
        ];
    }

    public function storeCasketImages($images, $casket) {
        foreach ($images as $image) {
            $casket->casketImages()->create([
                'image' => $this->fileService->saveImage($image, 'caskets'),
                'casket_id' => $casket->id
            ]);
        }
    }

}

