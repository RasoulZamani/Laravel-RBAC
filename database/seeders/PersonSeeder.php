<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Person::factory()->count(10)->create(); // Create 10 persons
       // Admin Person 
       Person::create([
            "name" => "admin",
            "last_name" => "admin",
            "father_name" => "admin",
            "alias_name" => "",
            "gender" => "male",
            "is_legal" => false,
            "national_code" => "1111111111",
            "mobile_phone" =>  "11111111111",
            "email" => "admin@admin.com",
            "birth_date" => "2024-10-01",
            "education_level_id" => "8",
            //"image_id" => "",
        ]);

        // sample person
        Person::create([
            "name" => "sample_person",
            "last_name" => "sample_person",
            "father_name" => "sample_person",
            "alias_name" => "",
            "gender" => "male",
            "is_legal" => false,
            "national_code" => "1111111112",
            "mobile_phone" =>  "11111111112",
            "email" => "sample_person@gmail.com",
            "birth_date" => "2024-10-02",
            "education_level_id" => "5",
            //"image_id" => "",
        ]);

    }
}
