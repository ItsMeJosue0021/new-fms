<?php

namespace App\Models;

use App\Models\Service;
use App\Models\HearseImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hearse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function service()
    {
        return $this->hasOne(Service::class);
    }

    public function hearseImage()
    {
        return $this->hasMany(HearseImage::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }
}
