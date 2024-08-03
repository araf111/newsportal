<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LiveStream extends Model
{
    use HasFactory;

    protected $table = 'live_streams';
    protected $primary_jd = 'id';

    protected $fillable = ['uuid', 'stream_link', 'status'];


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
