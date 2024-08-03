<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Category::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'আন্তর্জাতিক',
                'name_english' => 'International',
                'slug' => 'internation',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'রাজধানী',
                'name_english' => 'Capital City',
                'slug' => 'capital-city',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'সম্পাদকীয়',
                'name_english' => 'Editorial',
                'slug' => 'editorial',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'সারাদেশ',
                'name_english' => 'whole-country',
                'slug' => 'whole-country',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'রাজনীতি',
                'name_english' => 'Politics',
                'slug' => 'politics',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'অর্থনীতি',
                'name_english' => 'Economy',
                'slug' => 'economy',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'বিনোদন',
                'name_english' => 'Entertainment',
                'slug' => 'entertainment',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'লাইফ স্টাইল',
                'name_english' => 'Life style',
                'slug' => 'life-style',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'শিক্ষা',
                'name_english' => 'Education',
                'slug' => 'education',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'খেলা',
                'name_english' => 'Sports',
                'slug' => 'sports',
                'parent_id' => 0, // Make sure to hash the password
                'status' => 1,
                'sort_id'=> 1,
                'image' => 'uploads_demo/default/category-icon.jpg'
            ],
        ]);

    }
}
