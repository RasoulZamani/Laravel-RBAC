<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create list of permissions for app

        // list of tables
        $tables = [
            'user_types', 'users', 'persons','permissions','roles', 'education_levels', 'permission_role', 'permission_user',
        ];
        // list of actions
        $actions = [
            'viewAny', 'view', 'update', 'create', 'delete','own:view', 'own:update', 'own:delete', 
        ];
        $permissions = collect($tables)->crossJoin($actions)->map(function($pair){
            return ["title" => "{$pair[0]}:{$pair[1]}" , "created_at" =>Carbon::now(), "updated_at" => Carbon::now()];
        })->toArray();

        // store list of permissions in db
        Permission::insert($permissions);

    //     // permissions for users table
    //     Permission::create(["title" => "users:index"]);
    //     Permission::create(["title" => "users:show"]);
    //     Permission::create(["title" => "users:update"]);
    //     Permission::create(["title" => "users:create"]);
    //     Permission::create(["title" => "users:delete"]);
    //     Permission::create(["title" => "users:own:update"]);
    //     Permission::create(["title" => "users:own:delete"]);
        
    //     // permissions for persons table
    //     Permission::create(["title" => "persons:index"]);
    //     Permission::create(["title" => "persons:show"]);
    //     Permission::create(["title" => "persons:update"]);
    //     Permission::create(["title" => "persons:create"]);
    //     Permission::create(["title" => "persons:delete"]);
    //     Permission::create(["title" => "persons:own:update"]);
    //     Permission::create(["title" => "persons:own:delete"]);

    }
}
