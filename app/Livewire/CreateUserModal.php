<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class CreateUserModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-user-modal');
    }
}
