<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Epaper extends Model
{
    use HasFactory;

    protected $table = 'epapers';
    protected $primary_jd = 'id';

    protected $fillable = ['uuid', 'image', 'status'];


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
