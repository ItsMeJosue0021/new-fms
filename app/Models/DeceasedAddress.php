<?php

namespace App\Models;

use App\Models\Deceased;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeceasedAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'lot_block',
        'street',
        'brgy',
        'city',
        'province',
        'deceased_id'
    ];

    public function deceased()
    {
        return $this->belongsTo(Deceased::class);
    }


}
