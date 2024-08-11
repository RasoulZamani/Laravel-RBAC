<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permissions for users table
        Permission::create(["title" => "users:index"]);
        Permission::create(["title" => "users:show"]);
        Permission::create(["title" => "users:update"]);
        Permission::create(["title" => "users:create"]);
        Permission::create(["title" => "users:delete"]);
        
        // permissions for persons table
        Permission::create(["title" => "persons:index"]);
        Permission::create(["title" => "persons:show"]);
        Permission::create(["title" => "persons:update"]);
        Permission::create(["title" => "persons:create"]);
        Permission::create(["title" => "persons:delete"]);

        // permissions for permissions table
        Permission::create(["title" => "permissions:index"]);
        Permission::create(["title" => "permissions:show"]);
        Permission::create(["title" => "permissions:update"]);
        Permission::create(["title" => "permissions:create"]);
        Permission::create(["title" => "permissions:delete"]);
        
        // permissions for roles table
        Permission::create(["title" => "roles:index"]);
        Permission::create(["title" => "roles:show"]);
        Permission::create(["title" => "roles:update"]);
        Permission::create(["title" => "roles:create"]);
        Permission::create(["title" => "roles:delete"]);


    }
}
