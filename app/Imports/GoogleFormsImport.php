<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Program;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class GoogleFormsImport implements ToModel, WithHeadingRow
{
    protected $data = [];

    // first, store data in memory

    public function model(array $row){
        $program = Program::query()->where('program_Code', $row['program_code'])->first();

        $this->data[] = [
            's_StudentNo' => $row['student_id_no'],
            's_Surname' => $row['last_name'],
            's_FirstName' => $row['first_name'],
            's_MiddleName' => $row['middle_name'],
            's_Suffix' => $row['suffix'],

            's_c_HouseNo' => $row['house_number_city'],
            's_c_Street' => $row['street_city'],
            's_c_Barangay' => $row['barangay_city'],
            's_c_City' => $row['city_city'],
            's_c_Province' => $row['province_city'],

            's_p_HouseNo' => $row['house_number_province'],
            's_p_Street' => $row['street_province'],
            's_p_Barangay' => $row['barangay_province'],
            's_p_City' => $row['city_province'],
            's_p_Province' => $row['province_province'],

            's_Sex' => $row['sex'],
            's_Birthdate' => $row['birthdate'],

            's_ContactNo' => $row['contact_number'],
            's_EmailAddress' => $row['email_address'],

            's_ContactPersonName' => $row['contact_person_name'],
            's_ContactPersonNo' => $row['contact_person_number'],

            'program_id' => $program->program_id,
        ];

        $this->data = array_map(function($value){
            if(is_string($value)) return strtoupper($value);
            return $value;
        }, $this->data);

        return null;
    }

    public function getData()
    {
        return $this->data;
    }
}
