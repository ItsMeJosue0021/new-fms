<?php

namespace App\Models;

use App\Models\Service;
use App\Models\CasketImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Casket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'quantity'
    ];

    public function service()
    {
        return $this->hasOne(Service::class);
    }

    public function casketImage()
    {
        return $this->hasMany(CasketImage::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('price', 'like', '%' . request('search') . '%');
        }
    }
}
