<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href='{{ route('dashboard.showformator', $formator->f_id) }}' class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-arrow-left class='h-6' />
                <h1 class='font-semibold'>Return</h1>
            </a>
        </div>
    </div>

    <!-- Edit Formator Information Section -->
    <div class="flex justify-center mt-5">
        <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-left mb-5">Edit Formator Information</h1>

            <form action="{{ route('formator.update', $formator->f_id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Personal Information Section -->
                <div class="border-b pb-4 mb-4">
                    <div class="grid grid-cols-3 gap-4"> <!-- Changed to 3 columns -->
                        <div>
                            <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee ID</label>
                            <input type="text" name="employee_id" class="mt-1 p-2 border rounded w-full" value="{{ $formator->employee_id }}" required />
                            @error('employee_id')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_Surname" class="block text-sm font-medium text-gray-700">Family Name</label>
                            <input type="text" name="f_Surname" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_Surname }}" required />
                            @error('f_Surname')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_FirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="f_FirstName" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_FirstName }}" required />
                            @error('f_FirstName')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_MiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" name="f_MiddleName" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_MiddleName }}" />
                            @error('f_MiddleName')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_Sex" class="block text-sm font-medium text-gray-700">Sex</label>
                            <select name="f_Sex" class="mt-1 p-2 border rounded w-full" required>
                                <option value="male" {{ $formator->f_Sex == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $formator->f_Sex == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('f_Sex')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_Birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                            <input type="date" name="f_Birthdate" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_Birthdate }}" required />
                            @error('f_Birthdate')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="border-b pb-4 mb-4">
                    <div class="grid grid-cols-3 gap-4"> <!-- Changed to 3 columns -->
                        <div>
                            <label for="f_ContactNo" class="block text-sm font-medium text-gray-700">Contact No</label>
                            <input type="text" name="f_ContactNo" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_ContactNo }}" required />
                            @error('f_ContactNo')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_EmailAddress" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="f_EmailAddress" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_EmailAddress }}" required />
                            @error('f_EmailAddress')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Teaching Information Section -->
                <div>
                    <div class="grid grid-cols-3 gap-4"> <!-- Changed to 3 columns -->
                        <div>
                            <label for="f_TeachingYearStart" class="block text-sm font-medium text-gray-700">Teaching Year Start</label>
                            <input type="text" name="f_TeachingYearStart" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_TeachingYearStart }}" required />
                            @error('f_TeachingYearStart')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_TeachingUnitCount" class="block text-sm font-medium text-gray-700">Teaching Unit Count</label>
                            <input type="text" name="f_TeachingUnitCount" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_TeachingUnitCount }}" required />
                            @error('f_TeachingUnitCount')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_NSTPTeachingYearStart" class="block text-sm font-medium text-gray-700">NSTP Teaching Year Start</label>
                            <input type="text" name="f_NSTPTeachingYearStart" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_NSTPTeachingYearStart }}" required />
                            @error('f_NSTPTeachingYearStart')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="component_id" class="block text-sm font-medium text-gray-700">Component</label>
                            <select id="component_id" name="component_id" required class="mt-1 p-2 border rounded w-full" value="{{ $formator->component_id }}">
                                <option value="">Select component</option>
                                @foreach($components as $component)
                                <option value="{{ $component->component_id }}" {{ $formator->component_id === $component->component_id ? 'selected' : ''}}>{{ $component->component_Name }}</option>
                                @endforeach
                            </select>
                            @error('component_id')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_ActiveTeaching" class="block text-sm font-medium text-gray-700">Active Teaching</label>
                            <select name="f_ActiveTeaching" class="mt-1 p-2 border rounded w-full" required>
                                <option value="active" {{ $formator->f_EmploymentStatus == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $formator->f_EmploymentStatus == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('f_ActivteTeaching')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="f_EmploymentStatus" class="block text-sm font-medium text-gray-700">Employment Status</label>
                            <select name="f_EmploymentStatus" class="mt-1 p-2 border rounded w-full" required>
                                <option value="part-time" {{ $formator->f_EmploymentStatus == 'part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="full-time" {{ $formator->f_EmploymentStatus == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="contractual" {{ $formator->f_EmploymentStatus == 'contractual' ? 'selected' : '' }}>Contractual</option>
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
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-lg font-bold">Save</button>
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
