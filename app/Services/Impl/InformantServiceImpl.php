<?php

namespace App\Services\Impl;
use App\Models\Informant;
use App\Services\InformantService;

class InformantServiceImpl implements InformantService {
    public function saveInfromantInfo(array $data) {
        return Informant::create($this->toInformantInfoArray($data));
    }

    public function toInformantInfoArray(array $data) {
        return [
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'age' => $data['age'],
            'dob' => $data['dob'],
            'occupation' => $this->optionChecker($data["occupation"] ?? null, $data["other_occupation"] ?? null),
            'address' => $data['address'],
            'telephone' => $data['telephone'],
            'mobilephone' => $data['mobilephone'],
            'relationship_to_deceased' => $this->optionChecker($data["relationship_to_deceased"] ?? null, $data["other_relationship_to_deceased"] ?? null),
        ];
    }

    public function optionChecker($value, $other_value) {
        $option = $value;
        if ($value == 'Other') {
            $option = $other_value;
        } elseif ($value === '' && $other_value === '') {
            $option = null;
        }
        return $option;
    }
}

