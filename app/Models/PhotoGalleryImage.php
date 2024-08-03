<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGalleryImage extends Model
{
    use HasFactory;

    protected $table = 'photo_gallery_images';
    protected $primary_jd = 'id';

    protected $fillable = ['caption', 'photo_gallery_id', 'image'];


    public function photoGallery()
    {
        return $this->belongsTo(PhotoGallery::class);
    }
}
