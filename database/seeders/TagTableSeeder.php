<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Tag::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Breaking News',
                'slug' => 'breaking-news'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Top Stories',
                'slug' => 'top-stories'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Headlines',
                'slug' => 'headlines'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'World News',
                'slug' => 'world-news'
            ]
            ,
            [
                'uuid' => Str::uuid(),
                'name' => 'Latest News',
                'slug' => 'latest-news'
            ]
            ,
            [
                'uuid' => Str::uuid(),
                'name' => 'Exclusive',
                'slug' => 'exclusive'
            ]
            ,
            [
                'uuid' => Str::uuid(),
                'name' => 'Finance',
                'slug' => 'finance'
            ]
            ,
            [
                'uuid' => Str::uuid(),
                'name' => 'Economy',
                'slug' => 'economy'
            ]
        ]);

    }
}
