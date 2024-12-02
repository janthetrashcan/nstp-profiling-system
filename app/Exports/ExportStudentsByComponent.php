<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStudentsByComponent implements WithMultipleSheets
{
    use Exportable;
    protected $studentsByComponent;

    public function __construct($students){
        $this->studentsByComponent = is_array($students) ? collect($students) : $students;
    }

    public function sheets(): array{
        $sheets = [];

        foreach($this->studentsByComponent as $componentID => $students){
            $sheets[] = new StudentComponentSheet($componentID, $students);
        }

        return $sheets;
    }
}
