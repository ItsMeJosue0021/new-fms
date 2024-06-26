<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementImage extends Model
{
    use HasFactory;

    protected $fillable = ['announcement_id', 'image'];

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
