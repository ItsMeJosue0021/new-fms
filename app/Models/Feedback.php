<?php

namespace App\Models;

use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['service_request_id', 'name', 'content', 'stars', 'show_on_website'];

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class);
    }
}
