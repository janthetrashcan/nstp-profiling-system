<x-dashboard-layout>
    @if(session('error'))
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

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

            <form action="{{ route('formator.store') }}" method="POST" class="space-y-6" id='add-formator-form'>
                @csrf

                <!-- Personal Information Section -->
                <div class="border-b pb-4 mb-4">
                    <div class="grid grid-cols-3 gap-4">
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
                    <div class="grid grid-cols-3 gap-4">
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
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="f_TeachingYearStart" class="block text-sm font-medium text-gray-700">Teaching Year Start</label>
                            <input type="text" id="f_TeachingYearStart" name="f_TeachingYearStart" class="mt-1 p-2 border rounded w-full" />
                            @error('f_TeachingYearStart')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_NSTPTeachingYearStart" class="block text-sm font-medium text-gray-700">NSTP Teaching Year Start</label>
                            <input type="text" id="f_NSTPTeachingYearStart" name="f_NSTPTeachingYearStart" class="mt-1 p-2 border rounded w-full" />
                            @error('f_NSTPTeachingYearStart')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_TeachingUnitCount" class="block text-sm font-medium text-gray-700">Teaching Unit Count</label>
                            <input type="text" id="f_TeachingUnitCount" name="f_TeachingUnitCount" class="mt-1 p-2 border rounded w-full" />
                            @error('f_TeachingUnitCount')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="component_id" class="block text-sm font-medium text-gray-700">Component</label>
                            <select id="component_id" name="component_id" required class="mt-1 p-2 border rounded w-full">
                                <option value="">Select component</option>

                                @foreach($components as $component)
                                <option value="{{ $component->component_id }}">{{ $component->component_Name }}</option>
                                @endforeach
                            </select>

                            @error('component_id')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_ActiveTeaching" class="block text-sm font-medium text-gray-700">Active Teaching</label>
                            <select name="f_ActiveTeaching" class="mt-1 p-2 border rounded w-full" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('f_ActiveTeaching')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_EmploymentStatus" class="block text-sm font-medium text-gray-700">Employment Status</label>
                            <select id="f_EmploymentStatus" name="f_EmploymentStatus" required class="mt-1 p-2 border rounded w-full">
                                <option value="">Status</option>
                                <option value="part-time">Part-time</option>
                                <option value="full-time">Full-time</option>
                                <option value="contractual">Contractual</option>
                            </select>
                            @error('f_EmploymentStatus')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div>
                    <div>
                        <label for="f_Trainings" class="block text-sm font-medium text-gray-700">
                            Trainings
                            <p class='font-light italic text-gray-500 mb-2'>If multiple trainings, separate with enter key</p>
                        </label>
                        <textarea placeholder='Seminar/Training Title (Venue, Date)' id="f_Trainings" name="f_Trainings" class="mt-1 p-2 border border-gray-500 rounded w-full"></textarea>
                        @error('f_Trainings')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-900 hover:bg-blue text-white px-6 py-2 rounded-lg font-bold">Save</button>
                </div>
            </form>
        </div>
    </div>




    <script>
        // Get the textarea and form elements
        const textarea = document.getElementById('f_Trainings');
        const form = document.getElementById('add-formator-form');

        // Function to auto-resize textarea
        function autoResize() {
            // Reset height to auto to correctly calculate scroll height
            textarea.style.height = 'auto';

            // Set height based on scroll height
            textarea.style.height = `${textarea.scrollHeight}px`;
        }

        // Add event listener for input to dynamically resize
        textarea.addEventListener('input', autoResize);

        // Prevent form submission on Enter, allow new line instead
        textarea.addEventListener('keydown', (e) => {
            // Check if Enter is pressed without Shift
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault(); // Prevent default Enter behavior

                // Insert new line at cursor position
                const start = textarea.selectionStart;
                const end = textarea.selectionEnd;
                textarea.value = textarea.value.substring(0, start)
                    + "\n"
                    + textarea.value.substring(end);
                // Move cursor to the new line
                textarea.selectionStart = textarea.selectionEnd = start + 1;

                // Trigger auto-resize
                autoResize();
            }
        });

        // Handle form submission
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            // Here you would typically send the message
            console.log('Message submitted:', textarea.value);

            // Optional: Clear textarea after submission
            textarea.value = '';
            autoResize();
        });

        // Initial auto-resize
        autoResize();
    </script>
</x-dashboard-layout>
