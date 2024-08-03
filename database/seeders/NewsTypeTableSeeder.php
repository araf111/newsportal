<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\NewsType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        NewsType::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'খবর ডেমো ১',
                'name_eng' => 'News Demo 1',
                'type' => 'News Demo',
                'status' => 1
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'খবর ডেমো ২',
                'name_eng' => 'News Demo 2',
                'type' => 'News Demo',
                'status' => 1
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'খবর ডেমো ৩',
                'name_eng' => 'News Demo 3',
                'type' => 'News Demo',
                'status' => 1
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'খবর ডেমো ৪',
                'name_eng' => 'News Demo 4',
                'type' => 'News Demo',
                'status' => 1
            ]
        ]);

    }
}
