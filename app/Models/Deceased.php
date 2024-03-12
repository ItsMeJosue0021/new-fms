<?php

namespace App\Models;

use App\Models\Service;
use App\Models\DeathDetail;
use App\Models\DeceasedAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deceased extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'age',
        'sex',
        'height',
        'weight',
        'occupation',
        'citizenship',
        'religion',
        'civil_status',
        'fathers_name',
        'mother_maiden_name',
        'birth_place'
    ];

    public function service()
    {
        return $this->hasOne(Service::class);
    }

    public function deathDetail()
    {
        return $this->hasOne(DeathDetail::class);
    }

    public function deceasedAddress()
    {
        return $this->hasOne(DeceasedAddress::class);
    }
}
