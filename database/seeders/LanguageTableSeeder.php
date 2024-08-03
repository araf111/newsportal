<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Language::insert([
            [
                'language' => 'EN(English)',
                'iso_code' => 'en',
                'flag' => 'uploads_demo/default/en.png', // Make sure to hash the password
                'rtl' => 0,
                'status' => 1,
                'default_language'=> 'on'
            ],
            [
                'language' => 'BN(Bangla)',
                'iso_code' => 'bn',
                'flag' => 'uploads_demo/default/bn.png', // Make sure to hash the password
                'rtl' => 1,
                'status' => 1,
                'default_language'=> 'off'
            ],
        ]);

    }
}
