<?php

namespace App\Services\Impl;

use App\Services\FileService;

class FileServiceImpl implements FileService {

    public function saveImage($image, $path) {
        $image->store($path, 'public');
    }
}

