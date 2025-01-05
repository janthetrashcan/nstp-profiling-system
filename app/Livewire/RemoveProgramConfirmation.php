<?php

namespace App\Livewire;

use App\Models\Program;
use App\Models\Student;
use LivewireUI\Modal\ModalComponent;

class RemoveProgramConfirmation extends ModalComponent
{
    public Program $program;
    public $programs;
    public $students;

    public function mount()
    {
        $this->students = Student::all();
        $this->programs = Program::all();
    }

    public function render()
    {
        return view('livewire.remove-program-confirmation');
    }
}
