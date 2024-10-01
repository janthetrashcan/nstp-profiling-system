<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formator>
 */
class FormatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->randomNumber(6),
            'f_Surname' => fake()->lastName(),
            'f_FirstName' => fake()->firstName(),
            'f_MiddleName' => fake()->lastName(),

            'f_Sex' => fake()->randomElement(['male','female']),
            'f_Birthdate' => fake()->date('mm-dd-yyyy'),
            'f_ContactNo' => strval(fake()->phoneNumber()),
            'f_EmailAddress' => fake()->email(),

            'f_TeachingYearStart' => fake()->randomNumber(2),
            'f_NSTPTeachingYearStart' => fake()->randomNumber(2),
            'f_TeachingUnitCount' => fake()->randomNumber(2),
            'f_Component' => fake()->randomElement(['cwts','lts','rotc']),
            'f_EmploymentStatus' => fake()->randomElement(['hired', 'not hired']),
            'f_ActiveTeaching' => fake()->randomElement(['active','inactive'])
        ];
    }
}
