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
        $this->query = $this->query->filter(function ($student){
            // dd($student['component_id']);
            if(
            $student["component_id"] == Component::firstWhere('component_id', $this->component->component_id)->component_Name){
                return $student;
            }
        });

        return $this->query;
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
            'Final Grade',
            'Contact Person',
            'Contact Person Number',
            'Batch'
        ];
    }
}
