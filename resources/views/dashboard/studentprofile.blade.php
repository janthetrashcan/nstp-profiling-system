<x-dashboard-layout>
    @if(session('error'))
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif


    <!-- Top Action Bar -->
    <div class="flex flex-row pr-4 mb-6 justify-between items-center">
        <!-- Left Actions: Return, Edit, Delete -->
        <div id="functions-lhs" class="flex flex-row gap-x-3">
            <a href="{{ route('dashboard.studentlist', ['batch' => $student->batch->id]) }}" class="bg-gray-200 hover:bg-gray-300 transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                <x-carbon-arrow-left class="h-6" />
                <h1 class="font-semibold">Return</h1>
            </a>
            <a href="{{ route('dashboard.studentedit', $student->s_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                <x-carbon-edit class="h-6" />
                <h1 class="font-semibold">Edit</h1>
            </a>
            <form action="{{ route('student.destroy', $student->s_id) }}" method="POST" id="deleteSingleForm" onclick ="return confirm ('Delete selected student?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                    <x-carbon-trash-can class="h-6" />
                    <h1 class="font-semibold">Delete</h1>
                </button>
            </form>
        </div>
    </div>

    <!-- Student Profile Header -->
    <div class="flex justify-center mb-6">
        <h2 class="text-xl font-semibold text-gray-600">Viewing Student ID: {{ $student->s_StudentNo }}</h2>
    </div>

    <!-- Student Information Section -->
    <div id="student-profile" class="flex flex-col md:flex-row gap-6 justify-center">
        <!-- Personal Information -->
        <div id="student-info" class="flex flex-col gap-y-4 p-6 w-full md:w-96 rounded-xl bg-white shadow-lg">
            <h1 class="text-2xl font-bold text-gray-700 mb-4">Student Information</h1>

            <!-- Family Name -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Academic Year</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->batch->batch }}</p>
            </div>

            <!-- Family Name -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Family Name</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_Surname }}</p>
            </div>

            <!-- First Name -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">First Name</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_FirstName }}</p>
            </div>

            <!-- Middle Name -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Middle Name</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_MiddleName }}</p>
            </div>

            <!-- Sex -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Sex</p>
                <p class="font-normal w-2/3 text-gray-800">{{ ucfirst($student->s_Sex) }}</p>
            </div>

            <!-- Birthdate -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Birthdate</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_Birthdate }}</p>
            </div>

            <!-- Contact Number -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Contact Number</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_ContactNo }}</p>
            </div>

            <!-- Email Address -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Email Address</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_EmailAddress }}</p>
            </div>
            <!-- Section -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Section</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->section->sec_Section }}</p>
            </div>
            <!-- Grade -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Final Grade</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $student->s_FinalGrade }}</p>
            </div>
        </div>

        <!-- Program and Address Information -->
        <div class="flex flex-col gap-6 w-full md:w-96">
    <!-- Program Information -->
    <div id="student-program-info" class="p-6 rounded-xl bg-white shadow-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Program Information</h1>

                <!-- Program Code -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">Program Code</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $student->program->program_Code }}</p>
                </div>

                <!-- Program Name -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">Program Name</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $student->program->program_Title }}</p>
                </div>
            </div>

            <!-- Address Information -->
            <div class="flex flex-col gap-6">
                <!-- City Address -->
                <div class="p-6 w-full rounded-xl bg-white shadow-lg">
                    <h1 class="text-xl font-semibold text-gray-700 mb-4">City Address</h1>
                    <p class="text-gray-800">{{ $student->s_c_HouseNo }}, {{ $student->s_c_Street }}, {{ $student->s_c_Barangay }}, {{ $student->s_c_City }}, {{ $student->s_c_Province }}</p>
                </div>

                <!-- Provincial Address -->
                <div class="p-6 w-full rounded-xl bg-white shadow-lg">
                    <h1 class="text-xl font-semibold text-gray-700 mb-4">Provincial Address</h1>
                    <p class="text-gray-800">{{ $student->s_p_HouseNo }}, {{ $student->s_p_Street }}, {{ $student->s_p_Barangay }}, {{ $student->s_p_City }}, {{ $student->s_p_Province }}</p>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
