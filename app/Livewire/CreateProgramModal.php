<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateProgramModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-program-modal');
    }
}
