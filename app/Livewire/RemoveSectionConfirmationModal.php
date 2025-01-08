<?php

namespace App\Livewire;

use App\Models\Section;
use LivewireUI\Modal\ModalComponent;

class RemoveSectionConfirmationModal extends ModalComponent
{
    public Section $section;
    public function render()
    {
        return view('livewire.remove-section-confirmation-modal');
    }
}
