<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use App\Models\Candidate\CandidateInfo;
use App\Models\Dos\DosInfo;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        $user=User::find(1);
        //Add role and permissions 
        $role_permissions = json_decode(File::get(resource_path('data/role/role_permission.json')), true);

        foreach ($role_permissions as $key => $role_permission) {
            $new_role = Role::create(["name" => $key]);
            $user->assignRole($new_role);
            foreach ($role_permission as $permissionName) {
                // Create the permission if it does not exist
                $permission = Permission::firstOrCreate([
                    'name' => $permissionName,
                    'guard_name' => 'web'
                ]);
                // Assign the permission to the role
                $new_role->givePermissionTo($permission);
            }

        }

    }
}
