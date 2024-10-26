<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href="{{ route('dashboard.addstudent') }}" class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-add class='h-8' />
                <h2 class='font-semibold'>Add</h2>
            </a>
            <form action="{{ route('student.destroy') }}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                    <x-carbon-trash-can class='h-6' />
                    <h1 class='font-semibold'>Delete</h1>
                </button>
            </form>
            <button class='bg-slate-200 hover:bg-slate-300 transition-colors duration-200 flex flex-row w-fit h-12 px-2 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-filter class='h-6' />
                <h1 class='font-semibold'>Filter</h1>
            </button>
        </div>

        <div id='functions-rhs' class='flex flex-row gap-x-3'>
            <input type='text' placeholder='Search' maxlength='30' class='bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2' />
        </div>
    </div>

    <!-- Table Header -->
    <div class='cursor-default flex flex-row justify-between w-full h-auto p-4 rounded-lg'>
        <span class='w-4'></span>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Student ID
        </p>

        <!-- STUDENT NAME -->
        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            Family Name
        </p>
        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            First Name
        </p>
        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            Middle Name
        </p>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Program
        </p>
        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Component
        </p>
        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Section
        </p>
    </div>

   
    <!-- Student Data Rows -->
    @foreach($students as $student)
    <div class='cursor-default flex flex-row justify-between items-center overflow-x-hidden h-auto px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors duration-200 linear'>
        
        <!-- Delete Checkbox -->
        <div class="flex items-center w-12">
            <input type='checkbox' name='student_ids[]' value='{{ $student->s_id }}' form="deleteForm" class='w-4 h-4'>
        </div>

      
        <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="flex flex-row justify-between items-center w-full gap-4">
            
            <!-- Student ID -->
            <p class='text-lg w-1/12 overflow-x-hidden outline-r-2'>
                {{ $student->s_StudentNo }}
            </p>

            <!-- STUDENT NAME -->
            <p class='text-lg w-2/12 overflow-x-hidden outline-r-2'>
                {{ Str::upper($student->s_Surname) }}
            </p>
            <p class='text-lg w-2/12 overflow-x-hidden outline-r-2'>
                {{ Str::upper($student->s_FirstName) }}
            </p>
            <p class='text-lg w-2/12 overflow-x-hidden outline-r-2'>
                {{ Str::upper($student->s_MiddleName) }}
            </p>

            <!-- Program -->
            <p class='text-lg w-1/12 overflow-x-hidden outline-r-2'>
                {{ Str::upper($student->program->program_Code) }}
            </p>

            <!-- Component -->
            <p class='text-lg w-1/12 overflow-x-hidden outline-r-2'>
                {{ Str::upper($student->section->sec_Component) }}
            </p>

            <!-- Section -->
            <p class='text-lg w-1/12 overflow-x-hidden outline-r-2'>
                {{ Str::upper($student->section->sec_Section) }}
            </p>

        </a>
    </div>
    @endforeach


    
</x-dashboard-layout>
