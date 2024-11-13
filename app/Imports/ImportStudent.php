<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Program;
use App\Models\Section;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStudent implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $program = Program::where('program_Code', $row[7])->first();
        $section = Section::where('sec_Section', $row[14])->first();

        return new Student([
            's_StudentNo' => $row[0],
            's_Surname' => $row[1],
            's_FirstName' => $row[2],
            // 's_Suffix' => $row[3],
            // 's_MiddleInitial' => $row[4],
            's_MiddleName' => $row[5],
            's_Sex' => $row[15],
            's_Birthdate' => $row[9],
            's_ContactNo' => $row[11],
            's_EmailAddress' => $row[16],


            'program_id' => $program->program_id,


            'sec_id' => $section->sec_id,




        ]);
    }
}
