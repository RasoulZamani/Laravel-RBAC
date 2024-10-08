<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PersonSeeder;
use Database\Seeders\EducationLevel;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\PermissionRoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EducationLevelSeeder::class,
            UserTypeSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PersonSeeder::class,
            UserSeeder::class,
            PermissionRoleSeeder::class,


        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
