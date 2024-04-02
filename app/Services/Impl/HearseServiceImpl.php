<?php

namespace App\Services\Impl;
use App\Models\Casket;
use App\Models\Hearse;
use App\Models\HearseImage;
use App\Services\FileService;
use App\Services\HearseService;

class HearseServiceImpl implements HearseService {

    private $fileService;

    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
    }

    public function getHearses() {
        return Hearse::latest()->filter(Request(['search']))->paginate(7);
    }

    public function getHearseById($id) {
        return Hearse::findOrFail($id);
    }

    public function createHearse(array $data) {
        $hearse = Hearse::create($this->toHearseArray($data));

        if (!empty($data['images'])) {
            $this->storeHearseImages($data['images'], $hearse);
        }
    }

    public function updateHearse(array $data, $id) {
        $hearse = Hearse::findOrFail($id);
        $hearse->update($this->toHearseArray($data));

        if (!empty($data['images'])) {
            $this->storeHearseImages($data['images'], $hearse);
        }
    }

    public function deleteHearseImageById($id) {
        return HearseImage::findOrFail($id)->delete();
    }

    public function deleteHearse($id) {
        return Hearse::findOrFail($id)->delete();
    }

    public function toHearseArray(array $data): array {
        return [
            'name' => $data['name'],
            'description' => $data['description'],
        ];
    }

    public function storeHearseImages($images, $hearse) {
        foreach ($images as $image) {
            $hearse->hearseImages()->create([
                'image' => $this->fileService->saveImage($image, 'hearses'),
                'hearse_id' => $hearse->id
            ]);
        }
    }
}

