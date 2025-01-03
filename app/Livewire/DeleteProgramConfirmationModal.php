<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\Modal;
use LivewireUI\Modal\ModalComponent;

class DeleteProgramConfirmationModal extends ModalComponent
{
    public $showModal = false;
    public $itemId;

    protected $listeners = ['showDeleteModal'];

    public function showDeleteModal($itemId)
    {
        $this->itemId = $itemId;
        $this->showModal = true;
    }

    public function delete(){
        $this->showModal = false;
        $this->emit('itemDeleted');
    }
    public function render()
    {
        return view('livewire.delete-program-confirmation-modal', ['showModal' => $this->showModal,]);
    }
}
