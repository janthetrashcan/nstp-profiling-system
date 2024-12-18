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
        $f_Surname = fake()->lastName();
        $f_FirstName = fake()->firstName();
        $f_MiddleName = fake()->lastName();
        $f_FullName = $f_Surname.' '.$f_FirstName.' '.$f_MiddleName;

        return [
            'employee_id' => fake()->randomNumber(6),

            'f_Surname' => $f_Surname,
            'f_FirstName' => $f_FirstName,
            'f_MiddleName' => $f_MiddleName,
            'f_FullName' => $f_FullName,

            'f_Sex' => fake()->randomElement(['male','female']),
            'f_Birthdate' => fake()->date('m-d-Y'),
            'f_ContactNo' => fake()->regexify('/^(\+639\d{9}|09\d{9})$/'),
            'f_EmailAddress' => fake()->email(),

            'f_TeachingYearStart' => fake()->numberBetween(2000,2024),
            'f_NSTPTeachingYearStart' => fake()->numberBetween(2000,2024),
            'f_TeachingUnitCount' => fake()->numberBetween(3, 12),
            'f_EmploymentStatus' => fake()->randomElement(['part-time', 'full-time']),
            'f_ActiveTeaching' => fake()->randomElement(['active','inactive']),

            'component_id' => \App\Models\Component::inRandomOrder()->first()->component_id,
        ];
    }
}
