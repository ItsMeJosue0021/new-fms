<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Models\Profile;
use App\Services\FileService;
use App\Services\ProfileService;

class ProfileServiceImpl implements ProfileService
{
    private $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function saveProfile(array $profile, $user_id)
    {
        return Profile::create($this->toProfileArray($profile, $user_id));
    }

    public function updateProfile(array $data, $user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->profile) {
            return $user->profile->update($this->toUpdateProfileArray($data));
        } else {
            Profile::create($this->toProfileArray($data, $user->id));
        }
    }

    private function toProfileArray($data, $user_id)
    {
        if (isset($data['image'])) {
            $image = $data['image'];
        } else {
            $image = null;
        }

        return [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'] ?? null,
            'age' => $data['age'] ?? null,
            'sex' => $data['sex'] ?? null,
            'contact_number' => $data['contact_number'] ?? null,
            'image' => $image,
            'user_id' => $user_id,
        ];
    }

    public function toUpdateProfileArray(array $data)
    {
        if (isset($data['image'])) {
            $image = $data['image'];
        } else {
            $image = null;
        }

        return [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'contact_number' => $data['contact_number'],
            'image' => $image,
        ];
    }

}
