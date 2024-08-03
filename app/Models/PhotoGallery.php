<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\PhotoGalleryImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $table = 'photo_galleries';
    protected $primary_jd = 'id';

    protected $fillable = ['uuid', 'title', 'status'];


    public function photoGalleryImages(){

        return $this->hasMany(PhotoGalleryImage::class);
    }


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
