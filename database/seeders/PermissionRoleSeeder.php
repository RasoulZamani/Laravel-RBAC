<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        // create list of permissions for app

        // list of tables
        $tables = [
            'user_types', 'users', 'persons','permissions','roles', 'education_levels', 'permission_role', 'permission_user',
        ];
        // list of actions
        $actions = [
            'index', 'show', 'update', 'create', 'delete','own:show', 'own:update', 'own:delete'
        ];
        // Admin have all permissions
        $permissions = collect($tables)->crossJoin($actions)->map(function($pair){
            return ["title" => "{$pair[0]}:{$pair[1]}" , "created_at" =>Carbon::now(), "updated_at" => Carbon::now()];
        })->toArray();


        // store list of permission_role for admin in db
        // DB::table('permission_role')->insert();


    }
}
