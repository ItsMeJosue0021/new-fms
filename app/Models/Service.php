<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'deceased_id',
        'informant_id',
        'casket_id',
        'hearse_id',
        'water',
        'service_type',
        'others',
    ];

    public function deceased()
    {
        return $this->belongsTo(Deceased::class);
    }
}
