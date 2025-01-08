<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class RemoveUserConfirmationModal extends ModalComponent
{
    public User $user;
    public function render()
    {
        return view('livewire.remove-user-confirmation-modal');
    }
}
