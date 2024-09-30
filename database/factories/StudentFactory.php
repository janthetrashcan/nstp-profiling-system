<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            's_StudentNo' => fake()->randomNumber(6),


            's_Surname' => fake()->lastName(),
            's_FirstName' => fake()->firstName(),
            's_MiddleName' => fake()->lastName(),

            's_Sex' => fake()->randomElement(['male','female']),
            's_Birthdate' => fake()->date('m-d-y'),
            's_ContactNo' => strval(fake()->randomNumber(11)),
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
            's_ContactPersonNo' => strval(fake()->randomNumber(11)),

            'sec_id' => fake()->numberBetween(1, 20)
        ];
    }
}
