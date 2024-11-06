<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href='{{ route('dashboard.studentlist') }}' class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-arrow-left class='h-6' />
                <h1 class='font-semibold'>Return</h1>
            </a>
            <button class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <a href="{{ route('dashboard.studentedit', $student->s_id) }}" class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                    <x-carbon-edit class='h-6' />
                    <h1 class='font-semibold'>Edit</h1>
                </a>
            </button>
            <form action="{{ route('student.destroy', $student->s_id) }}" method="POST" id="deleteSingleForm" onclick="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                    <x-carbon-trash-can class='h-6' />
                    <h1 class='font-semibold'>Delete</h1>
                </button>
            </form>
        </div>

        <div id='functions-rhs' class='flex flex-row gap-x-3'>
            <input type='text' placeholder='Search' maxlength='30' class='bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2' />
        </div>
    </div>

    <div id='student-profile' class='flex flex-col gap-y-3'>
        <p>Viewing {{ $student->s_StudentNo }}</p>

        <div id='student-info' class='flex flex-col gap-y-2 p-6 w-96 rounded-xl bg-gray-100'>
            <h1 class='text-2xl font-bold mb-4'>Student Information</h1>
            <div class='flex flex-row gap-3'>
                <p class='font-semibold w-1/3'>Family Name</p>
                <p class='font-normal w-2/3'>{{ $student->s_Surname }}</p>
            </div>
            <div class='flex flex-row gap-3'>
                <p class='font-semibold w-1/3'>First Name</p>
                <p class='font-normal w-2/3'>{{ $student->s_FirstName }}</p>
            </div>
            <div class='flex flex-row gap-3'>
                <p class='font-semibold w-1/3'>Middle Name</p>
                <p class='font-normal w-2/3'>{{ $student->s_MiddleName }}</p>
            </div>
        </div>

        <div id='student-info' class='flex flex-col gap-y-2 p-6 w-96 rounded-xl bg-gray-100'>
            <div class='flex flex-row gap-3'>
                <p class='font-semibold w-1/3'>Program Code</p>
                <p class='font-normal w-2/3'>{{ $student->program->program_Code }}</p>
            </div>
            <div class='flex flex-row gap-3'>
                <p class='font-semibold w-1/3'>Program Name</p>
                <p class='font-normal w-2/3'>{{ $student->program->program_Title }}</p>
            </div>
            <div class='flex flex-row gap-3'>
                <p class='font-semibold w-1/3'>Section</p>
                <p class='font-normal w-2/3'>{{ $student->section->sec_Section }}</p>
            </div>
        </div>
    </div>
</x-dashboard-layout>
