<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin user
        User::create([
            'username' => config('secret.admin_username'),
            'password' => Hash::make(config('secret.admin_password')),
            'is_active' => true,
            'user_type_id' => 1,
            'person_id' => 1,
            'role_id' => 1,
        ]);

        // usual user
        User::create([
            'username' => 'user_test',
            'password' => Hash::make('user_test'),
            'is_active' => true,
            'user_type_id' => 2,
            'person_id' => 2,
            'role_id' => 2,
        ]);



        
    }
}
