<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create(['title' => 'Administrator',  'description' => 'Administrator user']);
        UserType::create(['title' => 'Usual_user',   'description' => 'General user user']);
        UserType::create(['title' => 'customer',  'description' => 'customer user']);
        UserType::create(['title' => 'Staff',  'description' => 'General staff user']);
        UserType::create(['title' => 'Driver', 'description' => 'driver user']);
    }
}
