<?php

namespace App\Models;

use App\Models\Casket;
use App\Models\Hearse;
use App\Models\Informant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function informant()
    {
        return $this->belongsTo(Informant::class);
    }

    public function casket()
    {
        return $this->belongsTo(Casket::class);
    }

    public function hearse()
    {
        return $this->belongsTo(Hearse::class);
    }
}
