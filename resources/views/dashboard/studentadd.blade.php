<x-dashboard-layout>
<div class="bg-white shadow-md rounded-lg p-4 w-3/4 mx-auto mb-8"><!-- Changed max-w to full -->
    <form action="{{ route('student.store') }}" method="POST">
            @csrf
            <div class='flex flex-row pr-4 mb-3 justify-between'>
                <div id='functions-lhs' class='flex flex-row gap-x-3'>
                    <a href='{{ route('dashboard.studentlist') }}' class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
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

            <div class="grid grid-cols-3 gap-4"> <!-- Grid for student info -->
                <!-- Student ID -->
                <div class="mb-4 col-span-3">
                    <label for="s_StudentNo" class="block text-sm font-medium text-gray-700">Student ID</label>
                    <input type="text" id="s_StudentNo" name="s_StudentNo" required class="mt-1 block w-1/3 border-gray-300 rounded-md shadow-sm px-3 py-2" />
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
                <div class="mb-4 col-span-3">
                    <label for="s_EmailAddress" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="s_EmailAddress" name="s_EmailAddress" required class="mt-1 block w-1/3 border-gray-300 rounded-md shadow-sm px-3 py-2" />
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
                            <option value="{{ $section->sec_id }}">{{ $section->sec_Section }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Component -->
                <div class="mb-4">
                    <label for="component_id" class="block text-sm font-medium text-gray-700">Section</label>
                    <select id="component_id" name="component_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                        <option value="">Select Component</option>
                        @foreach($components as $component)
                            <option value="{{ $component->component_id }}">{{ $component->component_Name }}</option>
                        @endforeach
                    </select>
                    @error('component_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Component -->
                <div class="mb-4">
                    <label for="s_FinalGrade" class="block text-sm font-medium text-gray-700">Section</label>
                    <select id="s_FinalGrade" name="s_FinalGrade" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                        <option value="">Select Final Grade</option>
                        @foreach($grades as $grade)
                        <option value="{{ $grade }}">{{ $grade }}</option>
                        @endforeach
                    </select>
                    @error('s_FinalGrade')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- City and Provincial Address -->
                <h2 class="col-span-3 text-lg font-semibold mb-4">Address</h2>
                <div class="grid grid-cols-2 gap-4 col-span-3"> <!-- New grid for addresses -->
                    <!-- City Address -->
                    <div class="mb-4">
                        <h3 class="font-semibold">City Address</h3>
                        <div>
                            <label for="s_c_HouseNo" class="block text-sm font-medium text-gray-700">House No</label>
                            <input type="text" id="s_c_HouseNo" name="s_c_HouseNo" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                        <div>
                            <label for="s_c_Street" class="block text-sm font-medium text-gray-700">Street</label>
                            <input type="text" id="s_c_Street" name="s_c_Street" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                        <div>
                            <label for="s_c_Barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                            <input type="text" id="s_c_Barangay" name="s_c_Barangay" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                        <div >
                            <label for="s_c_City" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" id="s_c_City" name="s_c_City" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                        <div>
                            <label for="s_c_Province" class="block text-sm font-medium text-gray-700">Province</label>
                            <input type="text" id="s_c_Province" name="s_c_Province" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>

                        <!-- Same as Provincial Address Checkbox -->
                        <div class="mt-4">
                            <input type="checkbox" id="sameAsProvincial" name="sameAsProvincial" {{ old('sameAsProvincial') ? 'checked' : '' }}>
                            <label for="sameAsProvincial" class="text-sm font-medium text-gray-700">Same as Provincial Address</label>
                        </div>
                    </div>

                    <!-- Provincial Address -->
                    <div class="mb-4">
                        <h3 class="font-semibold">Provincial Address</h3>
                        <div>
                            <label for="s_p_HouseNo" class="block text-sm font-medium text-gray-700">House No</label>
                            <input type="text" id="s_p_HouseNo" name="s_p_HouseNo" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                        <div>
                            <label for="s_p_Street" class="block text-sm font-medium text-gray-700">Street</label>
                            <input type="text" id="s_p_Street" name="s_p_Street" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                        <div>
                            <label for="s_p_Barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                            <input type="text" id="s_p_Barangay" name="s_p_Barangay" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                        <div>
                            <label for="s_p_Province" class="block text-sm font-medium text-gray-700">Province</label>
                            <input type="text" id="s_p_Province" name="s_p_Province" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                        <div>
                            <label for="s_p_City" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" id="s_p_City" name="s_p_City" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>
                    </div>
                </div>

                <!-- Contact Person Name -->
                <div class="mb-4 col-span-3">
                    <label for="s_ContactPersonName" class="block text-sm font-medium text-gray-700">Contact Person Name</label>
                    <input type="text" id="s_ContactPersonName" name="s_ContactPersonName" required class="mt-1 block w-1/2 border-gray-300 rounded-md shadow-sm px-3 py-2" />
                    @error('s_ContactPersonName')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contact Person Number -->
                <div class="mb-4 col-span-3">
                    <label for="s_ContactPersonNumber" class="block text-sm font-medium text-gray-700">Contact Person Number</label>
                    <input type="text" id="s_ContactPersonNo" name="s_ContactPersonNo" value="{{ old('s_ContactPersonNo') }}" required class="mt-1 block w-1/2 border-gray-300 rounded-md shadow-sm px-3 py-2" />
                    @error('s_ContactPersonNumber')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>


            </div>
            <!-- ADD STUDENT -->
            <div class="flex justify-end mt-">
                <button type="submit" class="w-1/6 bg-green-600 text-white hover:bg-green-700 rounded-md px-4 py-2">ADD NEW STUDENT</button>
            </div>
    </form>
</div>
    <script>
        const sameAsProvincial = document.getElementById('sameAsProvincial');
        const disableEdit = document.getElementById('disableEdit');

        const cityFields = {
            houseNo: document.getElementById('s_c_HouseNo'),
            street: document.getElementById('s_c_Street'),
            barangay: document.getElementById('s_c_Barangay'),
            city: document.getElementById('s_c_City'),
            province: document.getElementById('s_c_Province')
        };

        const provincialFields = {
            houseNo: document.getElementById('s_p_HouseNo'),
            street: document.getElementById('s_p_Street'),
            barangay: document.getElementById('s_p_Barangay'),
            province: document.getElementById('s_p_Province'),
            city: document.getElementById('s_p_City')
        };

        function copyProvincialToCity() {
            cityFields.houseNo.value = provincialFields.houseNo.value;
            cityFields.street.value = provincialFields.street.value;
            cityFields.barangay.value = provincialFields.barangay.value;
            cityFields.city.value = provincialFields.city.value;
            cityFields.province.value = provincialFields.province.value;

            // Trigger input events to ensure that changes are recognized
            Object.values(cityFields).forEach(field => {
                field.dispatchEvent(new Event('input', { bubbles: true }));
            });
        }

        // Function to handle disabling/enabling city address fields based on the checkboxes
        function handleDisableEdit() {
            const isDisabled = disableEdit.checked || sameAsProvincial.checked;
            Object.values(cityFields).forEach(field => field.disabled = isDisabled);
        }

        // Event listener for "Same as Provincial Address" checkbox
        sameAsProvincial.addEventListener('change', function() {
            if (sameAsProvincial.checked) {
                copyProvincialToCity();
            }
            handleDisableEdit();  // Update fields based on the checkbox
        });

        // Event listener for "Disable Edit" checkbox
        disableEdit.addEventListener('change', function() {
            handleDisableEdit();  // Update fields based on the checkbox
        });

        // Ensure the copy function runs on form submission if needed
        document.querySelector('form').addEventListener('submit', function() {
            if (sameAsProvincial.checked) {
                copyProvincialToCity();
            }
        });
    </script>
</x-dashboard-layout>
