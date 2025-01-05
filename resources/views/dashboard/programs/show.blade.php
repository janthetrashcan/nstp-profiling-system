<x-dashboard-layout>
    <!-- Top Action Bar -->
    <div class="flex flex-row pr-4 mb-6 justify-between items-center">
        <!-- Left Actions: Return, Edit, Delete -->
        <div id="functions-lhs" class="flex flex-row gap-x-3">
            <a href="{{ route('programs.index') }}" class="bg-gray-200 hover:bg-gray-300 transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                <x-carbon-arrow-left class="h-6" />
                <h1 class="font-semibold">Return</h1>
            </a>
            <a href="{{ route('programs.edit', $program->program_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                <x-carbon-edit class="h-6" />
                <h1 class="font-semibold">Edit</h1>
            </a>
            <form action="{{ route('programs.destroy', $program->program_id) }}" method="POST" id="deleteSingleForm" onclick ="return confirm ('Delete selected program?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                    <x-carbon-trash-can class="h-6" />
                    <h1 class="font-semibold">Delete</h1>
                </button>
            </form>
        </div>
    </div>

    <div class="flex flex-col">
        <h1 class="text-2xl font-bold mb-6">Program Information</h1>

        <div class="flex flex-col gap-2 px-6 py-4 w-fit bg-gray-100">
            <p>Program Code: {{ $program->program_Code }}</p>
            <p>Program Title: {{ $program->program_Title }}</p>
            <p>Number of Students Enrolled: {{ $studentCount }}</p>
        </div>
    </div>
</x-dashboard-layout>
