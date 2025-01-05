<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Program;
use Illuminate\Auth\Access\Gate;

class EditProgram extends ModalComponent
{
    public Program $program;

    public function render()
    {
        return view('livewire.edit-program');
    }
}
