<x-dashboard-layout>
    <!-- Top Action Bar -->
    <div class="flex flex-row pr-4 mb-6 justify-between items-center">
        <!-- Left Actions: Return, Edit, Delete -->
        <div id="functions-lhs" class="flex flex-row gap-x-3">
            <a href="{{ route('dashboard.studentlist') }}" class="bg-gray-200 hover:bg-gray-300 transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                <x-carbon-arrow-left class="h-6" />
                <h1 class="font-semibold">Return</h1>
            </a>
            <a href="{{ route('dashboard.studentedit', $student->s_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                <x-carbon-edit class="h-6" />
                <h1 class="font-semibold">Edit</h1>
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
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                    <x-carbon-trash-can class="h-6" />
                    <h1 class="font-semibold">Delete</h1>
                </button>
            </form>
        </div>

        <!-- Right Side: Search -->
        <div id="functions-rhs" class="flex">
            <input type="text" placeholder="Search" maxlength="30" class="bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 flex w-60 h-12 px-4 py-2 rounded-lg shadow-md" />
        </div>
    </div>

    <!-- Student Profile Header -->
    <div class="flex justify-center mb-6">
        <h2 class="text-xl font-semibold text-gray-600">Viewing Student: {{ $student->s_StudentNo }}</h2>
    </div>

    <!-- Student Information Section -->
    <div id="student-profile" class="flex flex-col md:flex-row gap-6 justify-center">
        <!-- Personal Information -->
        <div id="student-info" class="flex flex-col gap-y-4 p-6 w-full md:w-96 rounded-xl bg-white shadow-lg">
            <h1 class="text-2xl font-bold text-gray-700 mb-4">Student Information</h1>
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Family Name</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_Surname }}</p>
            </div>
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">First Name</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_FirstName }}</p>
            </div>
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Middle Name</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_MiddleName }}</p>
            </div>
        </div>

        <!-- Program and Section Information -->
        <div id="student-info" class="flex flex-col gap-y-4 p-6 w-full md:w-96 rounded-xl bg-white shadow-lg">
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Program Code</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->program->program_Code }}</p>
            </div>
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Program Name</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->program->program_Title }}</p>
            </div>
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Section</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->section->sec_Section }}</p>
            </div>
        </div>
    </div>
</x-dashboard-layout>
