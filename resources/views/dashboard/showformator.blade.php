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

    <!-- Top Navigation/Buttons -->
    <div class="flex flex-row pr-4 mb-6 justify-between items-center">
        <!-- Left Function Buttons -->
        <div id="functions-lhs" class="flex gap-x-3">
            <a href="{{ route('dashboard.formatorlist') }}" class="bg-gray-100 flex items-center h-12 px-4 py-2 rounded-lg gap-2 shadow">
                <x-carbon-arrow-left class="h-6" />
                <span class="font-semibold">Return</span>
            </a>
            <a href="{{ route('dashboard.formatoredit', $formator->f_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white flex items-center h-12 px-4 py-2 rounded-lg gap-2 shadow">
                <x-carbon-edit class="h-6" />
                <span class="font-semibold">Edit</span>
            </a>
            <form action="{{ route('formator.destroy', $formator->f_id) }}" method="POST" id="deleteSingleForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md " onclick ="return confirm ('Delete selected formator?')">
                    <x-carbon-trash-can class="h-6" />
                    <span class="font-semibold">Delete</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Profile Layout -->
    <div id="formator-profile" class="flex gap-x-6 p-6 bg-white rounded-xl shadow-lg">

        <div id="formator-photo" class="w-32 h-32 bg-gray-200 rounded-lg overflow-hidden shadow-md mt-20">
            <img src="{{ $formator->profile_photo_url ?? '/user_profile.png' }}" alt="Profile Photo" class="w-full h-full object-cover">
        </div>

        <!-- Formator Information Section -->
        <div class="flex flex-col w-full">
            <h1 class="text-3xl font-bold mb-6">Formator Information</h1>

            <!-- Combined Personal Information Fields -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-md mb-3">
                <p class="text-gray-500 font-semibold mb-2">Personal Information</p>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500 font-semibold">Employee ID</p>
                        <p class="text-lg">{{ $formator->employee_id }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Full Name</p>
                        <p class="text-lg">{{ $formator->f_FirstName }} {{ $formator->f_MiddleName }} {{ $formator->f_Surname }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Sex</p>
                        <p class="text-lg">{{ $formator->f_Sex }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Birthdate</p>
                        <p class="text-lg">{{ $formator->f_Birthdate }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Contact No</p>
                        <p class="text-lg">{{ $formator->f_ContactNo }}</p>
                    </div>
                </div>
            </div>

            <!-- Combined Professional Information Fields -->
            <div class="bg-gray-50 p-3 rounded-xl shadow-md mb-3">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500 font-semibold">Email Address</p>
                        <p class="text-lg">{{ $formator->f_EmailAddress }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Teaching Year Start</p>
                        <p class="text-lg">{{ $formator->f_TeachingYearStart }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">NSTP Teaching Year Start</p>
                        <p class="text-lg">{{ $formator->f_NSTPTeachingYearStart }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Teaching Unit Count</p>
                        <p class="text-lg">{{ $formator->f_TeachingUnitCount }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Component</p>
                        <p class="text-lg">{{ $formator->component->component_Name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Employment Status</p>
                        <p class="text-lg">{{ $formator->f_EmploymentStatus }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">Active Teaching</p>
                        <p class="text-lg">{{ $formator->f_ActiveTeaching ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>

            <!-- Combined Professional Information Fields -->
            <div class="bg-gray-50 p-3 rounded-xl shadow-md">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500 font-semibold">Trainings</p>
                        <p class="text-lg">{{ $formator->f_Trainings }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
