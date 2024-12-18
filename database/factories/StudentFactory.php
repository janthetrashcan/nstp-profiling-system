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

        $s_Surname = fake()->lastName();
        $s_FirstName = fake()->firstName();
        $s_MiddleName = fake()->lastName();
        $s_FullName = $s_Surname.' '.$s_FirstName.' '.$s_MiddleName;

        return [
            's_StudentNo' => fake()->numberBetween(200000,259999),
            'program_id' => \App\Models\Program::inRandomOrder()->first()->program_id,
            'batch_id' => \App\Models\Batch::inRandomOrder()->first()->id,

            's_Surname' => $s_Surname,
            's_FirstName' => $s_FirstName,
            's_MiddleName' => $s_MiddleName,
            's_FullName' => $s_FullName,

            's_Sex' => fake()->randomElement(['male','female']),
            's_Birthdate' => fake()->date('Y-m-d'),
            's_ContactNo' => fake()->regexify('/^(\+639\d{9}|09\d{9})$/'),
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
            's_ContactPersonNo' => fake()->regexify('/^(\+639\d{9}|09\d{9})$/'),

            'sec_id' => \App\Models\Section::inRandomOrder()->first()->sec_id,
            'component_id' => \App\Models\Component::inRandomOrder()->first()->component_id,
            's_FinalGrade' => fake()->randomElement(['F', $s_FinalGrade, $s_FinalGrade, $s_FinalGrade]),
        ];
    }
}
