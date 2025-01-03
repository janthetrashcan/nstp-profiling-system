<!-- filepath: resources/views/livewire/delete-program-confirmation-modal.blade.php -->
<div>
    @if($showModal)
        <div class="modal">
            <div class="modal-content">
                <h4>Confirm Delete</h4>
                <p>Are you sure you want to delete this program?</p>
                <button wire:click="delete">Yes, Delete</button>
                <button wire:click="$set('showModal', false)">Cancel</button>
            </div>
        </div>
    @endif
</div>
