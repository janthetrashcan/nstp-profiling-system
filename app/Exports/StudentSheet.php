<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Component;
use App\Models\Student;

class StudentSheet implements FromCollection, WithTitle, WithHeadings
{
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    /**
     * Return collection of students for this component
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::where('component_id', $this->component->component_id)
            ->select('s_StudentNo', 's_Surname', 's_FirstName', 's_MiddleName', 'program_id', 's_Sex', 's_Birthdate', 's_c_CompleteAddress', 's_p_CompleteAddress', 's_ContactNo', 's_EmailAddress', 'sec_id', 'component_id', 's_ContactPerson', 's_ContactPersonNo') // Customize fields as needed
            ->get();
    }

    /**
     * Return the sheet title (component name)
     *
     * @return string
     */
    public function title(): string
    {
        return $this->component->component_Name; // Assumes component model has a 'name' attribute
    }

    /**
     * Define headings for the sheet
     *
     * @return array
     */
    public function headings(): array
    {
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
