<?php

namespace App\Livewire;

use App\Models\Program;
use LivewireUI\Modal\ModalComponent;

class ProgramShowModal extends ModalComponent
{
    public $showModal = false;
    public $program;

    protected $listeners = ['openModal'];

    public function openModal($programId)
    {
        $this->program = Program::find($programId);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.program-show-modal');
    }
}
