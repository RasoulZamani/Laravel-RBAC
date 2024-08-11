<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['title' => 'Admin',  'description' => 'Administrator role']);
        Role::create(['title' => 'User',   'description' => 'General user role']);
        Role::create(['title' => 'Staff',  'description' => 'General staff role']);
        Role::create(['title' => 'Driver', 'description' => 'driver role']);
    }
}
