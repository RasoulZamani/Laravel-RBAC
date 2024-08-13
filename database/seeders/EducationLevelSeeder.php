<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationLevel::create(['title' => 'No_Education',  'description' => 'No eduction at all']);
        EducationLevel::create(['title' => 'Read/Write',  'description' => 'Read and write abilities']);
        EducationLevel::create(['title' => 'Primaryـeducation',  'description' => 'Six class graduated']);
        EducationLevel::create(['title' => 'Diploma',  'description' => 'High school graduated']);
        EducationLevel::create(['title' => 'Diploma',  'description' => 'High school graduated']);
        EducationLevel::create(['title' => 'Bachelor',  'description' => 'Bachelor university graduated']);
        EducationLevel::create(['title' => 'Master',  'description' => 'Master university graduated']);
        EducationLevel::create(['title' => 'PhD',  'description' => 'PhD university graduated']);
        EducationLevel::create(['title' => 'Post PhD',  'description' => 'Post PhD university graduated']);

    }
}
