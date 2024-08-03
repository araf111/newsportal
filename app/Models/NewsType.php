<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsType extends Model
{
    use HasFactory;

    protected $table = 'news_types';
    protected $primary_id = 'id'; 
    protected $fillable = ['uuid', 'name','name_eng', 'type','status'];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
