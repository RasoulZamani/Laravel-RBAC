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
        // fetch admin role
        $adminRole = Role::where('title','admin')->first();

        // fetch permissions (all of them for admin)
        $allPermissionIds = Permission::select('id')->get();

        // grant all permissions to admin role
        //foreach($allPermissionIds as $permissionId) {
        $adminRole->permissions()->attach($allPermissionIds);

        // store list of permission_role for admin in db
        // DB::table('permission_role')->insert();


    }
}
