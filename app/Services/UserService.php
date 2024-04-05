<?php

namespace App\Services;

interface UserService {
    public function saveUser(array $user);
    public function updateEmail($email, $user_id);
}
