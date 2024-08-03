<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPhotoGallery extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'image','caption'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function getImagePathAttribute()
    {
        if ($this->image)
        {
            return $this->image;
        } else {
            return 'uploads/default/blog.png';
        }
    }
}
