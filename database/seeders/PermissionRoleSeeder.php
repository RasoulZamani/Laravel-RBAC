<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Role *************************************
        // fetch admin role
        $adminRole = Role::where('title','admin')->first();

        // fetch permissions (all of them for admin)
        $allPermissionIds = Permission::select('id')->get();

        // grant all permissions to admin role
        $adminRole->permissions()->attach($allPermissionIds);

        //  Usual User Role *********************************
        // fetch user role
        $userRole = Role::where('title','User')->first();

        // permissions for usual user
        
        $userPermissions = [
            //'user_types:viewAny','user_types:view', 
            'persons:own:view','persons:own:delete','persons:own:update',
            'users:own:view','users:own:delete','users:own:update'
        ];
        // $userPermissionIds = [] ;
        // foreach($userPermissions as $userPerm) {
        //     $userPermissions[] = Permission::where('title',$userPerm)->select('id')->first()->id;
        // }
        $userPermissionIds = Permission::whereIn('title', $userPermissions)->pluck('id')->toArray();
        // grant all permissions to admin role
        $userRole->permissions()->attach($userPermissionIds);

    }
}
