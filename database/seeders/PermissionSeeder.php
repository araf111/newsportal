<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\CommonSystem\PermissionGroupController;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = json_decode(File::get(resource_path('data/role/permission.json')), true);
        foreach ($permission as $key => $value) {
            Permission::create(['name' => $value, 'guard_name' => 'web']);
        }

    }
}
