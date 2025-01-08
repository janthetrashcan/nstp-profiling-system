<?php

namespace App\Livewire;

use App\Models\Section;
use LivewireUI\Modal\ModalComponent;

class EditSectionModal extends ModalComponent
{
    public Section $section;

    public function render()
    {
        return view('livewire.edit-section-modal');
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
