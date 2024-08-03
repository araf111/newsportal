<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'news';
    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'sub_title',
        'description',
        'youtube_video',
        'facebook_video',
        'opinionWriter_id',
        'feature_image',
        'news_type_id',
        'news_heading_id',
        'author_id',
        'writer_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'visitorCount',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-M-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-M-Y');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function newsTags(){
        return $this->belongsToMany(Tag::class);
    }

    public function photoGalleries()
    {
        return $this->hasMany(NewsPhotoGallery::class);
    }

    public function newsAuthor()
    {
        return $this->hasOne(User::class,'id', 'author_id');
    }

    public function getImagePathAttribute()
    {
        if ($this->feature_image)
        {
            return $this->feature_image;
        } else {
            return 'uploads/default/blog.png';
        }
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

}
