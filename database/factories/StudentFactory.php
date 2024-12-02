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
        $s_c_HouseNo = fake()->streetName();
        $s_c_Street = fake()->streetName();
        $s_c_Barangay = fake()->streetName();
        $s_c_City = fake()->streetName();
        $s_c_Province = fake()->streetName();

        $s_p_HouseNo = fake()->streetName();
        $s_p_Street = fake()->streetName();
        $s_p_Barangay = fake()->streetName();
        $s_p_City = fake()->streetName();
        $s_p_Province = fake()->streetName();
        $s_FinalGrade = strval(fake()->numberBetween(1, 4));

        return [
            's_StudentNo' => fake()->numberBetween(100000,999999),
            'program_id' => \App\Models\Program::inRandomOrder()->first()->program_id,

            's_Surname' => fake()->lastName(),
            's_FirstName' => fake()->firstName(),
            's_MiddleName' => fake()->lastName(),

            's_Sex' => fake()->randomElement(['male','female']),
            's_Birthdate' => fake()->date('mm-dd-yyyy'),
            's_ContactNo' => strval(fake()->phoneNumber()),
            's_EmailAddress' => fake()->email(),

            's_c_HouseNo' => $s_c_HouseNo,
            's_c_Street' => $s_c_Street,
            's_c_Barangay' => $s_c_Barangay,
            's_c_City' => $s_c_City,
            's_c_Province' => $s_c_Province,

            's_p_HouseNo' => $s_p_HouseNo,
            's_p_Street' => $s_p_Street,
            's_p_Barangay' => $s_p_Barangay,
            's_p_City' => $s_p_City,
            's_p_Province' => $s_p_Province,

            's_c_CompleteAddress' => $s_c_HouseNo.', '.$s_c_Street.', '.$s_c_Barangay.', '.$s_c_City.', '.$s_c_Province,
            's_p_CompleteAddress' => $s_p_HouseNo.', '.$s_p_Street.', '.$s_p_Barangay.', '.$s_p_City.', '.$s_p_Province,

            's_ContactPersonName' => fake()->name(),
            's_ContactPersonNo' => strval(fake()->phoneNumber()),

            'sec_id' => \App\Models\Section::inRandomOrder()->first()->sec_id,
            'component_id' => \App\Models\Component::inRandomOrder()->first()->component_id,
            's_FinalGrade' => fake()->randomElement(['F', $s_FinalGrade, $s_FinalGrade, $s_FinalGrade]),

            's_SchoolYear' => '2024-2025',
            's_Semester' => 1,
        ];
    }
}
