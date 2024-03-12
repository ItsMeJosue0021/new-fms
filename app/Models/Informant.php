<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Informant extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'dob',
        'occupation',
        'address',
        'telephone',
        'mobilephone',
        'relationship_to_deceased'
    ];

    public function service()
    {
        return $this->hasOne(Service::class);
    }


}
