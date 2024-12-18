<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Component;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class StudentSheet implements FromCollection, WithTitle, WithHeadings
{
    protected $component;
    protected $query;

    public function __construct(Component $component, Collection $query)
    {
        $this->query = $query;
        $this->component = $component;
    }

    /**
     * Return collection of students for this component
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->query->filter(function ($student){
            // dd($student["batch_id"]);
            if(isset($student["batch_id"]) && $student["batch_id" === $this->component->component_id]){
                return $student["batch_id" == $this->component->component_id];
            }
        });
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
