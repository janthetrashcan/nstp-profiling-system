<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStudents implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data = [];

    public function collection()
    {
        return Student::select('s_StudentNo','s_Surname','s_FirstName','s_MiddleName','program_id','s_Sex','s_Birthdate','s_c_CompleteAddress','s_p_CompleteAddress','s_ContactNo','s_EmailAddress','sec_id','s_ContactPersonName', 's_ContactPersonNo')->get();
    }

    public function headings(): array{
        return [
            'Student ID No.',
            'Surname',
            'First Name',
            'Middle Name',
            'Program ID',
            'Sex',
            'Birthdate',
            'City Address',
            'Provincial Address',
            'Contact Number',
            'Email Address',
            'Section ID',
            'Contact Person',
            'Contact Person Number'
        ];
    }
}
