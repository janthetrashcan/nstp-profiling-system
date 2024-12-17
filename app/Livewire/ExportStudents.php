<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Component;
use App\Models\Section;
use App\Models\Program;
use App\Models\Student;

class ExportStudents extends ModalComponent
{
    public $components;
    public $sections;
    public $programs;
    public $students;
    public function mount(){
        $this->components = Component::all();
        $this->sections = Section::all();
        $this->programs = Program::all();
        $this->students = Student::all();
    }
    public function render()
    {
        return view('livewire.export-students');
    }
    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
