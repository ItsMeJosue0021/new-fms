<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'lot',
        'block',
        'street',
        'brgy',
        'city',
        'province',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
