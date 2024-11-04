<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-3'>
            <a href="{{ route('dashboard.addstudent') }}" class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex items-center h-12 px-4 py-2 rounded-xl gap-2'>
                <x-carbon-add class='h-8' />
                <h2 class='font-semibold'>Add</h2>
            </a>
            <form action="{{ route('student.destroy') }}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex items-center h-12 px-4 py-2 rounded-xl gap-2">
                    <x-carbon-trash-can class='h-6' />
                    <h1 class='font-semibold'>Delete</h1>
                </button>
            </form>
            <button class='hover:bg-gray-100 transition-colors duration-200 flex items-center h-12 px-2 py-2 rounded-xl gap-2'>
                <x-carbon-filter class='h-6' />
                <h1 class='font-semibold'>Filter</h1>
            </button>
        </div>

        <div id="functions-rhs" class="flex gap-3">
            <input type="text" placeholder="Search" maxlength="30" 
                class="bg-white border border-gray-300 hover:bg-slate-300 transition-colors duration-200 px-4 py-2 rounded-lg w-60">
        </div>
    </div>

    <div class="flex justify-between bg-gray-100 p-4 rounded-t-lg">
        <span class="w-4"></span>
        <span class="text-lg font-semibold w-2/12">Family Name</span>
        <span class="text-lg font-semibold w-2/12">First Name</span>
        <span class="text-lg font-semibold w-2/12">Middle Name</span>
        <span class="text-lg font-semibold w-1/12">Age</span>
        <span class="text-lg font-semibold w-2/12">Teaching Year Start</span>
        <span class="text-lg font-semibold w-2/12">NSTP Teaching Year Start</span>
        <span class="text-lg font-semibold w-1/12">Units Count</span>
        <span class="text-lg font-semibold w-1/12">Component</span>
    </div>

    <!-- Formator List Section -->
    @foreach($formators as $formator)
    <div class="flex justify-between items-center px-4 py-3 hover:bg-gray-50 transition-colors duration-200">
        <!-- Checkbox for Delete -->
        <div class="flex items-center w-4">
            <input type="checkbox" name="student_ids[]" value="{{ $formator->f_id }}" form="deleteForm" class="w-4 h-4">
        </div>

        <a href="{{ route('dashboard.showformator', $formator->f_id) }}" class="flex justify-between w-full items-center gap-4">
            <span class="text-lg w-2/12">{{ Str::upper($formator->f_Surname) }}</span>
            <span class="text-lg w-2/12">{{ Str::upper($formator->f_FirstName) }}</span>
            <span class="text-lg w-2/12">{{ Str::upper($formator->f_MiddleName) }}</span>
            <span class="text-lg w-1/12">{{ $formator->f_Age }}</span>
            <span class="text-lg w-2/12">{{ $formator->f_TeachingYearStart }}</span>
            <span class="text-lg w-2/12">{{ $formator->f_NSTPTeachingYearStart }}</span>
            <span class="text-lg w-1/12">{{ $formator->f_TeachingUnitCount }}</span>
            <span class="text-lg w-1/12">{{ Str::upper($formator->f_Component) }}</span>
        </a>
    </div>
    @endforeach

    <!-- Pagination Section (optional) -->
    <div id="page-buttons" class="flex justify-end gap-5">
        <!-- Pagination links go here if needed -->
    </div>
</x-dashboard-layout>
