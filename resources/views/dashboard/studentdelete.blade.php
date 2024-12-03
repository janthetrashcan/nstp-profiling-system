<x-dashboard-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-xl font-semibold mb-4">Are you sure you want to delete the selected students?</h1>
        
        <div class="mb-4">
            <h2 class="text-lg font-medium">Selected Students:</h2>
            <ul class="list-disc list-inside">
                @foreach($students as $student)
                    <li>{{ $student->s_FirstName }} {{ $student->s_Surname }} - ID: {{ $student->s_StudentNo }}</li>
                @endforeach
            </ul>
        </div>

        <form action="{{ route('student.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="confirmed" value="true">
            
            @foreach($studentIds as $id)
                <input type="hidden" name="student_ids[]" value="{{ $id }}">
            @endforeach
            
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Yes, Delete</button>
            <a href="{{ route('dashboard.studentlist') }}" class="ml-4 text-blue-500">Cancel</a>
        </form>
    </div>
</x-dashboard-layout>
