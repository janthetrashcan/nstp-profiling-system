<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            's_StudentNo' => fake()->numberBetween(100000,999999),
            'program_id' => fake()->numberBetween(0,27),

            's_Surname' => fake()->lastName(),
            's_FirstName' => fake()->firstName(),
            's_MiddleName' => fake()->lastName(),

            's_Sex' => fake()->randomElement(['male','female']),
            's_Birthdate' => fake()->date('mm-dd-yyyy'),
            's_ContactNo' => strval(fake()->phoneNumber()),
            's_EmailAddress' => fake()->email(),

            's_c_HouseNo' => fake()->streetName(),
            's_c_Street' => fake()->streetName(),
            's_c_Barangay' => fake()->streetName(),
            's_c_City' => fake()->city(),
            's_c_Province' => fake()->city(),

            's_p_HouseNo' => fake()->streetName(),
            's_p_Street' => fake()->streetName(),
            's_p_Barangay' => fake()->streetName(),
            's_p_City' => fake()->city(),
            's_p_Province' => fake()->city(),

            's_ContactPersonName' => fake()->name(),
            's_ContactPersonNo' => strval(fake()->phoneNumber()),

            'sec_id' => fake()->numberBetween(1, 10)
        ];
    }
}
