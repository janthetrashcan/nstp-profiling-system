<div x-data="{ showModal: @entangle('showModal') }">
    <div x-show="showModal" class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-xl font-bold mb-4">Program Details</h2>
                <p>{{ $program->name }}</p>
                <button @click="showModal = false" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Close</button>
            </div>
        </div>
    </div>
</div>
