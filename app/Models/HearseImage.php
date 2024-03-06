<?php

namespace App\Models;

use App\Models\Hearse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HearseImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'hearse_id'
    ];

    public function hearse()
    {
        return $this->belongsTo(Hearse::class);
    }
}
