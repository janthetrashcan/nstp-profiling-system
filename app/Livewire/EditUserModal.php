<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditUserModal extends ModalComponent
{
    public User $user;

    public function render()
    {
        return view('livewire.edit-user-modal');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
