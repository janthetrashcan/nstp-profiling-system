<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class CreateSectionModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-section-modal');
    }
}
