<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Meta;
use App\Models\Setting;
use App\Models\Language;
use App\Models\NewsType;
use App\Models\NoticeBoard;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(LookupTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(NewsTypeTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }
}
