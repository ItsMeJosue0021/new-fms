<?php

namespace App\Models;

use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function announcementImages()
    {
        return $this->hasMany(AnnouncementImage::class);
    }
}
