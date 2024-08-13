<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    protected $model = \App\Models\Person::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => $this->faker->firstName, // Random first name
            // 'last_name' => $this->faker->lastName, // Random last name
            // 'alias_name' => $this->faker->optional()->word, // Random alias name, can be null
            // 'father_name' => $this->faker->optional()->name, // Random father name, can be null
            // 'gender' => $this->faker->randomElement(['male', 'female']), // Random gender
            // 'is_legal' => $this->faker->boolean, // Random boolean for legal status
            // 'national_code' => $this->faker->unique()->numerify('##########'), // Unique national code
            // 'mobile_number' => $this->faker->unique()->phoneNumber, // Unique phone number
            // 'email' => $this->faker->optional()->safeEmail, // Random email, can be null
            // 'birth_date' => $this->faker->optional()->dateTimeBetween('-60 years', '-18 years'), // Random birth date
            // 'education_level_id' =>null,// \App\Models\EducationLevel::factory(), // Random foreign key for education level
            // 'image_id' =>null, //\App\Models\Image::factory(), // Random foreign key for image
        ];
    }
}
