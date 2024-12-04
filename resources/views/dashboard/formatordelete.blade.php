<x-dashboard-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-xl font-semibold mb-4">Are you sure you want to delete the selected formators?</h1>
        
        <div class="mb-4">
            <h2 class="text-lg font-medium">Selected Formators:</h2>
            <ul class="list-disc list-inside">
                @foreach($formators as $formator)
                    <li>{{ $formator->f_FirstName }} {{ $formator->f_Surname }} - ID: {{ $formator->employee_id }}</li>
                @endforeach
            </ul>
        </div>

        <form action="{{ route('formator.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            
            @foreach($formatorIds as $id)
                <input type="hidden" name="formator_ids[]" value="{{ $id }}">
            @endforeach
            
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Yes, Delete</button>
            <a href="{{ route('dashboard.formatorlist') }}" class="ml-4 text-blue-500">Cancel</a>
        </form>
    </div>
</x-dashboard-layout>