<x-dashboard-layout>
    <!-- Top Navigation/Buttons -->
    <div class="flex flex-row pr-4 mb-6 justify-between items-center">
        <!-- Left Function Buttons -->
        <div id="functions-lhs" class="flex gap-x-3">
            <a href="{{ route('dashboard.formatorlist') }}" class="bg-gray-100 flex items-center h-12 px-4 py-2 rounded-xl gap-2 shadow">
                <x-carbon-arrow-left class="h-6" />
                <span class="font-semibold">Return</span>
            </a>
            <a href="{{ route('dashboard.formatoredit', $formator->f_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white flex items-center h-12 px-4 py-2 rounded-xl gap-2 shadow">
                <x-carbon-edit class="h-6" />
                <span class="font-semibold">Edit</span>
            </a>
            <form action="{{ route('formator.destroy', $formator->f_id) }}" method="POST" id="deleteSingleForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                    <x-carbon-trash-can class="h-6" />
                    <span class="font-semibold">Delete</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Formator Profile Header -->
    <div class="flex justify-center mb-6">
        <h2 class="text-xl font-semibold text-gray-600">Viewing Formator ID: {{ $formator->employee_id }}</h2>
    </div>

    <!-- Formator Information Section -->
    <div id="formator-profile" class="flex flex-col md:flex-row gap-6 justify-center">
        <!-- Personal Information -->
        <div id="formator-info" class="flex flex-col gap-y-4 p-6 w-full md:w-96 rounded-xl bg-white shadow-lg">
            <h1 class="text-2xl font-bold text-gray-700 mb-4">Formator Information</h1>

            <!-- Formator ID -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Formator ID</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $formator->employee_id }}</p>
            </div>

            <!-- Full Name -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Full Name</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_FirstName }} {{ $formator->f_MiddleName }} {{ $formator->f_Surname }}</p>
            </div>

            <!-- Sex -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Sex</p>
                <p class="font-normal w-2/3 text-gray-800">{{ ucfirst($formator->f_Sex) }}</p>
            </div>

            <!-- Birthdate -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Birthdate</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_Birthdate }}</p>
            </div>

            <!-- Contact Number -->
            <div class="flex flex-row gap-3">
                <p class="font-semibold w-1/3 text-gray-600">Contact Number</p>
                <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_ContactNo }}</p>
            </div>
        </div>

        <!-- Program and Professional Information Section -->
        <div id="formator-program" class="flex flex-col gap-6">
            <!-- Professional Information -->
            <div class="flex flex-col gap-y-4 p-6 w-full md:w-96 rounded-xl bg-white shadow-lg">
                <h1 class="text-2xl font-bold text-gray-700 mb-4">Professional Information</h1>

                <!-- Email Address -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">Email Address</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_Email }}</p>
                </div>

                <!-- Teaching Year Start -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">Teaching Year Start</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_TeachingYearStart }}</p>
                </div>

                <!-- NSTP Teaching Year Start -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">NSTP Teaching Year Start</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_NSTPTeachingYearStart }}</p>
                </div>

                <!-- Teaching Unit Count -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">Teaching Unit Count</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_TeachingUnitCount }}</p>
                </div>

                <!-- Component -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">Component</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_Component }}</p>
                </div>

                <!-- Employment Status -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">Employment Status</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_EmploymentStatus }}</p>
                </div>

                <!-- Active Teaching -->
                <div class="flex flex-row gap-3">
                    <p class="font-semibold w-1/3 text-gray-600">Active Teaching</p>
                    <p class="font-normal w-2/3 text-gray-800">{{ $formator->f_ActiveTeaching ? 'Yes' : 'No' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
