<?php

namespace App\Services\Impl;

use App\Models\Service;
use App\Models\Deceased;
use App\Models\DeathDetail;
use App\Models\DeceasedAddress;
use App\Services\DeceasedService;
use App\Exceptions\ServiceNotFoundException;
use App\Exceptions\DeceasedNotFountException;

class DeceasedServiceImpl implements DeceasedService
{

    private $serviceNotBeFoundMessage = 'Service can not be found';
    public function saveDeceasedPersonalInfo($serviceId, array $data)
    {
        $service = Service::find($serviceId);
        if (!$service) {
            throw new ServiceNotFoundException($this->serviceNotBeFoundMessage);
        }

        if ($service->deceased()->exists()) {
            $service->deceased->fill($this->toPersonalInfoArray($data))->save();
            return $service->deceased;
        } else {
            return Deceased::create($this->toPersonalInfoArray($data));
        }
    }

    public function saveDeceasedAddress(array $data, $id)
    {
        $deceased = Deceased::find($id);
        if (!$deceased) {
            throw new DeceasedNotFountException($this->serviceNotBeFoundMessage);
        }

        if ($deceased->deceasedAddress()->exists()) {
            return $deceased->deceasedAddress->update($this->toAddressArray($data, $id));
        } else {
            return DeceasedAddress::create($this->toAddressArray($data, $id));
        }
    }

    public function saveDeathDetails(array $data, $id)
    {
        $deceased = Deceased::find($id);
        if (!$deceased) {
            throw new DeceasedNotFountException($this->serviceNotBeFoundMessage);
        }

        if ($deceased->deathDetail()->exists()) {
            return $deceased->deathDetail->update($this->toDeathDetailsArray($data, $id));
        } else {
            return DeathDetail::create($this->toDeathDetailsArray($data, $id));
        }
    }

    public function toPersonalInfoArray(array $data)
    {
        return [
            "first_name" => $data["first_name"],
            "middle_name" => $data["middle_name"],
            "last_name" => $data["last_name"],
            "dob" => $data["dob"],
            "age" => $data["age"],
            "sex" => $data["sex"],
            "height" => $data["height"],
            "weight" => $data["weight"],
            "occupation" => $this->optionChecker($data["occupation"] ?? null, $data["other_occupation"] ?? null),
            "citizenship" => $this->optionChecker($data["citizenship"] ?? null, $data["other_citizenship"] ?? null),
            "religion" => $this->optionChecker($data["religion"] ?? null, $data["other_religion"] ?? null),
            "civil_status" => $data["civil_status"],
            "fathers_name" => $data["fathers_name"],
            "mother_maiden_name" => $data["mother_maiden_name"],
            "birth_place" => $data["birth_place"],
        ];
    }

    public function toAddressArray(array $data, $id)
    {
        return [
            "lot_block" => $data["lot_block"],
            "street" => $data["street"],
            "brgy" => $data["brgy"],
            "city" => $data["city"],
            "province" => $data["province"],
            "deceased_id" => $id,
        ];
    }

    public function toDeathDetailsArray(array $data, $id)
    {
        return [
            "death_time" => $data["death_time"],
            "death_date" => $data["death_date"],
            "death_cause" => $this->optionChecker($data["death_cause"] ?? null, $data["other_death_cause"] ?? null),
            "death_place"=> $data["death_place"],
            "cementery_address" => $data["cementery_address"],
            "viewing_place" => $data["viewing_place"],
            "internment_time" => $data["internment_time"],
            "internment_date" => $data["internment_date"],
            "deceased_id" => $id
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

