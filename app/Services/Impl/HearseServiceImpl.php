<?php

namespace App\Services\Impl;
use App\Models\Casket;
use App\Models\Hearse;
use App\Services\FileService;
use App\Services\HearseService;

class HearseServiceImpl implements HearseService {

    private $fileService;

    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
    }

    public function getHearses() {
        return Hearse::latest()->filter(Request(['search']))->paginate(8);
    }

    public function createHearse(array $data) {
        $hearse = Hearse::create($this->toHearseArray($data));
        $this->storeHearseImages($data['images'], $hearse);
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

