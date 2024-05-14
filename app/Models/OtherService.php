<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtherService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'service',
        'price',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
