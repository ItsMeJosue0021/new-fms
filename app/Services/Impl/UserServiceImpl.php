<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;

class UserServiceImpl implements UserService {
    public function saveUser(array $user) {
        $user = User::create($this->toAccountArray($user));
        return $user;
    }

    private function toAccountArray($data) {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
            'role_id' => 2
        ];
    }

}
