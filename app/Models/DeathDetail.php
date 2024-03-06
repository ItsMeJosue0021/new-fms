<?php

namespace App\Models;

use App\Models\Deceased;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeathDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'death_time',
        'death_date',
        'death_cause',
        'cementery_address',
        'viewing_place',
        'internment_time',
        'internment_date',
        'deceased_id'
    ];

    public function deceased()
    {
        return $this->belongsTo(Deceased::class);
    }
}
