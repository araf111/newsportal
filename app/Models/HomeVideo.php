<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeVideo extends Model
{
    use HasFactory;

    protected $table = 'home_videos';
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
