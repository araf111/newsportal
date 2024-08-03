<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoGallery extends Model
{
    use HasFactory;

    protected $table = 'video_galleries';
    protected $primary_jd = 'id';

    protected $fillable = ['uuid', 'video_url', 'type', 'caption', 'status'];


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
