<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <button class='bg-slate-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-add class='h-8' />
                <h1 class='font-semibold'>Add</h1>
            </button>
            <button class='bg-slate-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-trash-can class='h-6' />
                <h1 class='font-semibold'>Delete</h1>
            </button>
            <button class='flex flex-row w-fit h-12 px-2 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-filter class='h-6' />
                <h1 class='font-semibold'>Filter</h1>
            </button>
        </div>

        <div id='functions-rhs' class='flex flex-row gap-x-3'>
            <input type='text' placeholder='Search' maxlength='30' class='bg-slate-200 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2' />
        </div>

    </div>

    <div class='cursor-default flex flex-row justify-between w-full h-auto p-4 rounded-lg'>
        <span class='w-4'></span>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden'>
            Student ID
        </p>

        <!--  STUDENT NAME  -->

        <p class='text-lg w-2/12 font-semibold overflow-x-hidden'>
            Family Name
        </p>
        <p class='text-lg w-2/12 font-semibold overflow-x-hidden'>
            First Name
        </p>
        <p class='text-lg w-2/12 font-semibold overflow-x-hidden'>
            Middle Name
        </p>


        <p class='text-lg w-1/12 font-semibold overflow-x-hidden'>
            Program
        </p>
        <p class='text-lg w-1/12 font-semibold overflow-x-hidden'>
            Component
        </p>
        <p class='text-lg w-1/12 font-semibold overflow-x-hidden'>
            Section
        </p>

        <!--
        <div class='flex flex-row w-auto items-center justify-end'>
            <x-carbon-edit class='text-brand-text-dark-bg h-6 px-2'/>
            <x-carbon-trash-can class='text-brand-text-dark-bg h-6'/>
        </div>
        -->
    </div>

    @foreach($students as $student)
    <a href='{{ route('dashboard.showstudent', ['s_id' => $student->s_id]) }}' class='cursor-default flex flex-row justify-between overflow-x-hidden h-auto p-3 rounded-lg hover:bg-slate-200 transition-colors duration-200 linear'>
        <input type='checkbox' class='w-4'>

        <p class='text-lg w-1/12 overflow-x-hidden'>
            {{ $student->s_StudentNo }}
        </p>

        <!--  STUDENT NAME  -->

        <p class='text-lg w-2/12 overflow-x-hidden'>
            {{ Str::upper($student->s_Surname) }}
        </p>
        <p class='text-lg w-2/12 overflow-x-hidden'>
            {{ Str::upper($student->s_FirstName) }}
        </p>
        <p class='text-lg w-2/12 overflow-x-hidden'>
            {{ Str::upper($student->s_MiddleName) }}
        </p>


        <p class='text-lg w-1/12 overflow-x-hidden'>
            {{ Str::upper($student->program->program_Code) }}
        </p>
        <p class='text-lg w-1/12 overflow-x-hidden'>
            {{ Str::upper($student->section->sec_Component) }}
        </p>
        <p class='text-lg w-1/12 overflow-x-hidden'>
            {{ Str::upper($student->section->sec_Section) }}
        </p>

        <!--
        <div class='flex flex-row w-auto items-center justify-end'>
            <x-carbon-edit class='text-brand-text-dark-bg h-6 px-2'/>
            <x-carbon-trash-can class='text-brand-text-dark-bg h-6'/>
        </div>
        -->
    </a>
    @endforeach

    <div id='page-buttons' class='flex flex-row justify-end gap-6'>
        {{ $students->links() }}
    </div>

</x-dashboard-layout>
