<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Urn extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'stock',
        'price',
    ];

    public function services() {
        return $this->hasMany(Service::class);
    }
}
