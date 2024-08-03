<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryWiseAdvertisement extends Model
{
    use HasFactory;

    protected $table = 'category_wise_advertisements';
    protected $primary_id = 'id';

    protected $fillable = ['uuid','ad_page','ad_number','ad_position','image','ad_link','category_id','status'];



    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
