<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class StudentMultiRemoveConfirmation extends ModalComponent
{
    public $studentIds = [];
    public $isModalOpen = false;

    public function StudentMultiRemoveConfirmation($studentIds){
        $this->studentIds = explode(',', $studentIds);
        $this->isModalOpen = true;
    }

    public function mount($studentIds)
    {
        $this->studentIds = $studentIds;
    }

    public function render()
    {
        $students = \App\Models\Student::all();

        return view('livewire.student-multi-remove-confirmation', compact('students', 'studentIds'));
    }
}
