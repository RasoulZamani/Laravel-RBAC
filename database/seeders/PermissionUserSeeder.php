<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // fetch admin 
        $adminUser = User::where('username',config('secret.admin_username'))->first();
        
        // fetch permissions (all of them for admin)
        $allPermissionIds = Permission::select('id')->get();

        // grant all permissions to admin user
        $adminUser->permissions()->attach($allPermissionIds);

        // sample user -> ...
       // $sampleUser = User::where('username','sample_user_test')->first();




    }
}
