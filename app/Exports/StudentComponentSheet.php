<?php

namespace App\Exports;

use App\Models\Component;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentComponentSheet implements FromCollection, WithTitle, WithHeadings
{
    private $componentID;
    private $students;

    public function __construct($componentID, $students){
        $this->componentID = $componentID;
        $this->students = $students;
    }

    public function collection(){
        return $this->students->map(function ($student){
            return [
                'student_id_no' => $student->s_id,
                'surname' => $student->s_Surname,
                'first_name' => $student->s_FirstName,
                'middle_name' => $student->s_MiddleName,
                'program_code' => $student->program->program_Code,
                'sex' => $student->s_Sex,
                'birthdate' => $student->s_Birthdate,
                'city_address' => $student->s_c_CompleteAddress,
                'provincial_address' => $student->s_p_CompleteAddress,
                'contact_number' => $student->s_ContactNo,
                'email_address' => $student->s_EmailAddress,
                'section' => $student->section->sec_Section,
                'component' => $student->component->component_Name,
                'contact_person' => $student->s_ContactPersonName,
                'contact_person_number' => $student->s_ContactPersonNo
            ];
        });
    }

    public function title(): string{
        $componentName = Component::where('component_Name', $this->componentID)->first()->pluck('component_Name');

        return $componentName;
    }

    public function headings(): array{
        return [
            'Student ID No.',
            'Surname',
            'First Name',
            'Middle Name',
            'Program Code',
            'Sex',
            'Birthdate',
            'City Address',
            'Provincial Address',
            'Contact Number',
            'Email Address',
            'Section',
            'Component',
            'Contact Person',
            'Contact Person Number'
        ];
    }
}
