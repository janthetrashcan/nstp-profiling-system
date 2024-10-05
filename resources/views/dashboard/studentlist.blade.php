<x-dashboard-layout>
    @foreach($students as $student)
    <div class='cursor-default flex flex-row justify-between w-full h-auto p-6 rounded-lg bg-slate-200 hover:bg-slate-300 transition-colors duration-200 linear'>
        <p class='text-lg w-1/12 overflow-x-hidden'>
            {{ $student->s_StudentNo }}
        </p>
        <p class='text-lg w-6/12 overflow-x-hidden'>
            {{ Str::upper($student->s_Surname) }} {{ Str::upper($student->s_FirstName) }} {{ Str::upper($student->s_MiddleName) }}
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

        <div class='flex flex-row w-auto items-center justify-end'>
            <x-carbon-edit class='text-brand-text-dark-bg h-6 px-2'/>
            <x-carbon-trash-can class='text-brand-text-dark-bg h-6'/>
        </div>
    </div>
    @endforeach

    <div id='page-buttons' class='flex flex-row justify-end gap-6'>
        {{ $students->links() }}
    </div>

</x-dashboard-layout>
