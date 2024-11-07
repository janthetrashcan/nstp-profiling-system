<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href='{{ route('dashboard.formatorlist') }}' class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-arrow-left class='h-6' />
                <h1 class='font-semibold'>Return</h1>
            </a>
        </div>
    </div>

    <!-- Add New Formator Section -->
    <div class="flex justify-center mt-5">
        <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-left mb-5">Add New Formator</h1>

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('formator.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Personal Information Section -->
                <div class="border-b pb-4 mb-4">
                    <div class="grid grid-cols-3 gap-4"> <!-- 3-column grid -->
                        <div>
                            <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee ID</label>
                            <input type="text" id="employee_id" name="employee_id" required class="mt-1 p-2 border rounded w-full" />
                            @error('employee_id')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_Surname" class="block text-sm font-medium text-gray-700">Family Name</label>
                            <input type="text" id="f_Surname" name="f_Surname" required class="mt-1 p-2 border rounded w-full" />
                            @error('f_Surname')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_FirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" id="f_FirstName" name="f_FirstName" required class="mt-1 p-2 border rounded w-full" />
                            @error('f_FirstName')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_MiddleName" class="block text-sm font-medium text-gray-700">Middle Name (optional)</label>
                            <input type="text" id="f_MiddleName" name="f_MiddleName" class="mt-1 p-2 border rounded w-full" />
                        </div>
                        <div>
                            <label for="f_Sex" class="block text-sm font-medium text-gray-700">Sex</label>
                            <select id="f_Sex" name="f_Sex" required class="mt-1 p-2 border rounded w-full">
                                <option value="">Select Sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('f_Sex')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_Birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                            <input type="date" id="f_Birthdate" name="f_Birthdate" required class="mt-1 p-2 border rounded w-full" />
                            @error('f_Birthdate')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="border-b pb-4 mb-4">
                    <div class="grid grid-cols-3 gap-4"> <!-- 3-column grid -->
                        <div>
                            <label for="f_ContactNo" class="block text-sm font-medium text-gray-700">Contact Number</label>
                            <input type="text" id="f_ContactNo" name="f_ContactNo" required class="mt-1 p-2 border rounded w-full" />
                            @error('f_ContactNo')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_EmailAddress" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" id="f_EmailAddress" name="f_EmailAddress" required class="mt-1 p-2 border rounded w-full" />
                            @error('f_EmailAddress')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Teaching Information Section -->
                <div>
                    <div class="grid grid-cols-3 gap-4"> <!-- 3-column grid -->
                        <div>
                            <label for="f_TeachingYearStart" class="block text-sm font-medium text-gray-700">Teaching Year Start</label>
                            <input type="text" id="f_TeachingYearStart" name="f_TeachingYearStart" class="mt-1 p-2 border rounded w-full" />
                        </div>
                        <div>
                            <label for="f_NSTPTeachingYearStart" class="block text-sm font-medium text-gray-700">NSTP Teaching Year Start</label>
                            <input type="text" id="f_NSTPTeachingYearStart" name="f_NSTPTeachingYearStart" class="mt-1 p-2 border rounded w-full" />
                        </div>
                        <div>
                            <label for="f_TeachingUnitCount" class="block text-sm font-medium text-gray-700">Teaching Unit Count</label>
                            <input type="text" id="f_TeachingUnitCount" name="f_TeachingUnitCount" class="mt-1 p-2 border rounded w-full" />
                        </div>
                        <div>
                            <label for="f_Component" class="block text-sm font-medium text-gray-700">Component</label>
                            <select id="f_Component" name="f_Component" required class="mt-1 p-2 border rounded w-full">
                                <option value="">Component</option>
                                <option value="cwts">CWTS</option>
                                <option value="rotc">ROTC</option>
                                <option value="lts">LTS</option>
                            </select>
                        </div>
                        <div>
                            <label for="f_EmploymentStatus" class="block text-sm font-medium text-gray-700">Employment Status</label>
                            <select id="f_EmploymentStatus" name="f_EmploymentStatus" required class="mt-1 p-2 border rounded w-full">
                                <option value="">Status</option>
                                <option value="hired">Hired</option>
                                <option value="not hired">Not Hired</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg font-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
