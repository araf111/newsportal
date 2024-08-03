<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsTag extends Model
{
    use HasFactory;

    protected $table = 'news_tags';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'news_id',
        'slug'
    ];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
