<?php

namespace App\Services\Impl;

use App\Models\Profile;
use App\Services\ProfileService;

class ProfileServiceImpl implements ProfileService
{
    public function saveProfile(array $profile, $user_id)
    {
        return Profile::create($this->toProfileArray($profile, $user_id));
    }

    private function toProfileArray($data, $user_id)
    {
        return [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_id' => $user_id,
        ];
    }

}
