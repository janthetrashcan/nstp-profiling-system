<?php

namespace App\Livewire;

use App\Models\Section;
use LivewireUI\Modal\ModalComponent;

class EditMultipleSectionsModal extends ModalComponent
{
    public Section $sections = [];
    public function render()
    {
        return view('livewire.edit-multiple-sections-modal');
    }
}
