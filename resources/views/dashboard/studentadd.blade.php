<x-dashboard-layout>

    <form action="{{ route('student.store') }}" method="POST">
    @csrf
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href='{{ route('dashboard.studentlist') }}' class='bg-slate-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-arrow-left class='h-6' />
                <h1 class='font-semibold'>Return</h1>
            </a>
        </div>
    </div>

    <h1 class="text-xl font-bold mb-4">Add New Student</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

        <!-- Student ID -->
        <div class="mb-4">
            <label for="s_StudentNo" class="block text-sm font-medium text-gray-700">Student ID</label>
            <input type="text" id="s_StudentNo" name="s_StudentNo" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_StudentNo')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Family Name -->
        <div class="mb-4">
            <label for="s_Surname" class="block text-sm font-medium text-gray-700">Family Name</label>
            <input type="text" id="s_Surname" name="s_Surname" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_Surname')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- First Name -->
        <div class="mb-4">
            <label for="s_FirstName" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" id="s_FirstName" name="s_FirstName" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_FirstName')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Middle Name -->
        <div class="mb-4">
            <label for="s_MiddleName" class="block text-sm font-medium text-gray-700">Middle Name (optional)</label>
            <input type="text" id="s_MiddleName" name="s_MiddleName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
        </div>

        <!-- Sex -->
        <div class="mb-4">
            <label for="s_Sex" class="block text-sm font-medium text-gray-700">Sex</label>
            <select id="s_Sex" name="s_Sex" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                <option value="">Select Sex</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('s_Sex')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Birthdate -->
        <div class="mb-4">
            <label for="s_Birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
            <input type="date" id="s_Birthdate" name="s_Birthdate" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_Birthdate')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contact Number -->
        <div class="mb-4">
            <label for="s_ContactNo" class="block text-sm font-medium text-gray-700">Contact Number</label>
            <input type="text" id="s_ContactNo" name="s_ContactNo" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_ContactNo')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <label for="s_EmailAddress" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" id="s_EmailAddress" name="s_EmailAddress" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_EmailAddress')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Program -->
        <div class="mb-4">
            <label for="program_id" class="block text-sm font-medium text-gray-700">Program</label>
            <select id="program_id" name="program_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                <option value="">Select Program</option>
                @foreach($programs as $program)
                    <option value="{{ $program->program_id }}">{{ $program->program_Code }}</option>
                @endforeach
            </select>

            @error('program_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Section -->
        <div class="mb-4">
            <label for="sec_id" class="block text-sm font-medium text-gray-700">Section</label>
            <select id="sec_id" name="sec_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                <option value="">Select Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->sec_id }}">{{ $section->sec_id }}</option>
                @endforeach
            </select>
            @error('section_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- City Address -->
        <div class="mb-4">
            <label for="s_c_HouseNo" class="block text-sm font-medium text-gray-700">City House No</label>
            <input type="text" id="s_c_HouseNo" name="s_c_HouseNo" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_c_HouseNo')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_c_Street" class="block text-sm font-medium text-gray-700">City Street</label>
            <input type="text" id="s_c_Street" name="s_c_Street" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_c_Street')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_c_Barangay" class="block text-sm font-medium text-gray-700">City Barangay</label>
            <input type="text" id="s_c_Barangay" name="s_c_Barangay" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_c_Barangay')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_c_City" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" id="s_c_City" name="s_c_City" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_c_City')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_c_Province" class="block text-sm font-medium text-gray-700">City Province</label>
            <input type="text" id="s_c_Province" name="s_c_Province" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_c_Province')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Provincial Address -->
        <div class="mb-4">
            <label for="s_p_HouseNo" class="block text-sm font-medium text-gray-700">Provincial House No</label>
            <input type="text" id="s_p_HouseNo" name="s_p_HouseNo" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_p_HouseNo')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_p_Street" class="block text-sm font-medium text-gray-700">Provincial Street</label>
            <input type="text" id="s_p_Street" name="s_p_Street" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_p_Street')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_p_Barangay" class="block text-sm font-medium text-gray-700">Provincial Barangay</label>
            <input type="text" id="s_p_Barangay" name="s_p_Barangay" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_p_Barangay')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_p_City" class="block text-sm font-medium text-gray-700">Provincial City</label>
            <input type="text" id="s_p_City" name="s_p_City" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_p_City')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_p_Province" class="block text-sm font-medium text-gray-700">Provincial Province</label>
            <input type="text" id="s_p_Province" name="s_p_Province" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_p_Province')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contact Person -->
        <div class="mb-4">
            <label for="s_ContactPersonName" class="block text-sm font-medium text-gray-700">Contact Person Name</label>
            <input type="text" id="s_ContactPersonName" name="s_ContactPersonName" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_ContactPersonName')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="s_ContactPersonNo" class="block text-sm font-medium text-gray-700">Contact Person Number</label>
            <input type="text" id="s_ContactPersonNo" name="s_ContactPersonNo" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
            @error('s_ContactPersonNo')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2">Add Student</button>
    </form>
</x-dashboard-layout>
