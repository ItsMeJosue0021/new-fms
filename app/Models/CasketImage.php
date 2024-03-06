<?php

namespace App\Models;

use App\Models\Casket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CasketImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'casket_id'
    ];

    public function casket()
    {
        return $this->belongsTo(Casket::class);
    }
}
