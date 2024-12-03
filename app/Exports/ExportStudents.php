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

    public function __construct($data = null){
        $this->data = $data ?: [];
    }

    public function collection()
    {
        return $this->data;
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
