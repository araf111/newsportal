<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsHeading extends Model
{
    use HasFactory;

    protected $table = 'news_headings';
    protected $primary_id = 'id'; 
    protected $fillable = ['title','is_feature'];
}
