<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Section;
use App\Models\Program;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class RegistrarDataImport implements ToModel, WithHeadingRow
{
    protected $data = [];

    // first, store data in memory
    public function model(array $row){
        try{
            if(isset($row['student_id_no']) && $row['subject'] === 'NSTP'){
                $section = Section::query()->where('sec_Section', '=', $row['section'])->first();
                $program = Program::query()->where('program_Code', '=', $row['program'])->first();

                $this->data[] = [
                    's_StudentNo' => $row['student_id_no'],
                    's_Surname' => $row['last_name'],
                    's_FirstName' => $row['first_name'],
                    's_MiddleName' => $row['middle_name'],
                    's_Suffix' => $row['suffix'],

                    's_c_HouseNo' => $row['house_no'],
                    's_c_Street' => $row['street'],
                    's_c_Barangay' => $row['barangay'],
                    's_c_City' => $row['city'],
                    // 's_c_Province' => $row['Province'], // Registrar form has no province field

                    's_Sex' => $row['sex'],
                    's_Birthdate' => $row['birthdate'],

                    's_ContactNo' => $row['contact_no'],
                    's_FinalGrade' => $row['final_grade'],

                    'program_id' => $program->program_id,
                    'sec_id' => $section->sec_id,
                ];
            }
        }

        catch(\Exception $e){
            return redirect()->back()->with('error', 'Error in importing registrar file: '.$e);
        }

        return null;
    }

    public function getData()
    {
        return $this->data;
    }
}
