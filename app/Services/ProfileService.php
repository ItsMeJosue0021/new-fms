<?php

namespace App\Services;

interface ProfileService {
    public function saveProfile(array $profile, $user_id);
}
