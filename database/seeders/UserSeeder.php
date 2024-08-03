<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::insert(
            [
                [
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('password'),
                    'mobile_number' => '01737312462',
                    'role' => 1
                ],
                [
                    'name' => 'author',
                    'email' => 'author@admin.com',
                    'password' => Hash::make('password'),
                    'mobile_number' => '01737312433',
                    'role' => 2
                ],
                [
                    'name' => 'smith',
                    'email' => 'smith@admin.com',
                    'password' => Hash::make('password'),
                    'mobile_number' => '01737312422',
                    'role' => 2
                ],
                [
                    'name' => 'ariyan',
                    'email' => 'ariyan@admin.com',
                    'password' => Hash::make('password'),
                    'mobile_number' => '01737312499',
                    'role' => 3
                ],
                [
                    'name' => 'imma',
                    'email' => 'imma@admin.com',
                    'password' => Hash::make('password'),
                    'mobile_number' => '01737312488',
                    'role' => 3
                ]
            ]
        );

    }
}
