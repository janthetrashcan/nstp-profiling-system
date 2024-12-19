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

    <div class="flex flex-row pr-4 mb-3 justify-between">
        <div id="functions-lhs" class="flex flex-row gap-x-3">
            <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                <x-carbon-arrow-left class="h-6" />
                <h1 class="font-semibold">Return</h1>
            </a>
        </div>
    </div>

    <div class="flex flex-col gap-y-3 p-6 max-w-6xl mx-auto bg-white shadow-lg rounded-lg">
        <!-- Title -->
        <h1 class="text-3xl font-bold mb-6">Edit Student Information</h1>

        <!-- Student Update Form -->
        <form action="{{ route('student.update', $student->s_id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Student Information -->
            <div class="grid grid-cols-3 gap-6">
                <div class="mb-4 col-span-3">
                    <label for="batch_id" class="block text-sm font-medium text-gray-700">Academic Year</label>
                    <select id="batch_id" name="batch_id" required class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm px-3 py-2">
                        @foreach($batches as $batch)
                            <option value="{{ $batch->id }}" {{
                                ($student->batch_id == $batch->id) ? 'selected' : '' }}>{{ $batch->batch }}
                            </option>
                        @endforeach
                    </select>
                    @error('batch_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Student No -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Student No </label>
                    <input type="text" name="s_StudentNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_StudentNo }}" required>
                    @error('s_StudentNo')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>


                <!-- First Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="s_FirstName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_FirstName }}" required>
                    @error('s_FirstName')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Middle Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                    <input type="text" name="s_MiddleName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_MiddleName }}">
                    @error('s_MiddleName')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Family Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Family Name</label>
                    <input type="text" name="s_Surname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_Surname }}" required>
                    @error('s_Surname')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sex -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sex</label>
                    <select name="s_Sex" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="male" {{ $student->s_Sex == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $student->s_Sex == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('s_Sex')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Birthdate -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Birthdate</label>
                    <input type="date" name="s_Birthdate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_Birthdate }}" required>
                    @error('s_Birthdate')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contact Number -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Contact No</label>
                    <input type="text" name="s_ContactNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_ContactNo }}" required>
                    @error('s_ContactNo')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="s_EmailAddress" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_EmailAddress }}" required>
                    @error('s_EmailAddress')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Program Code --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Program Code</label>
                    <select name="program_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->program->program_Code }}" required>
                        @foreach($programs as $program)
                        <option value='{{ $program->program_id }}'>{{ $program->program_Code }}</option>
                        @endforeach
                    </select>
                    @error('program_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Section -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Section</label>
                    <select name="sec_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->section->sec_Section }}" required>
                        @foreach($sections as $section)
                        <option value='{{ $section->sec_id }}' {{ $student->sec_id == $section->sec_id ? 'selected' : ''}}>{{ $section->sec_Section }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Component -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Section</label>
                    <select name="component_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->section->sec_Section }}" required>
                        @foreach($components as $component)
                        <option value='{{ $component->component_id }}'>{{ $component->component_Name }}</option>
                        @endforeach
                    </select>
                    @error('component_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="s_FinalGrade" class="block text-sm font-medium text-gray-700">Final Grade</label>
                    <select id="s_FinalGrade" name="s_FinalGrade" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                        <option value="">Select Final Grade</option>
                        @foreach($grades as $grade)
                        <option value="{{ $grade }}" {{ $student->s_FinalGrade === $grade ? "selected" : ""}}>{{ $grade }}</option>
                        @endforeach
                    </select>
                    @error('s_FinalGrade')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Address Information -->
            <div class="grid grid-cols-3 gap-6">
                <!-- City Address -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">City Address</h2>

                    <!-- House No -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">House No</label>
                        <input type="text" name="s_c_HouseNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_HouseNo }}" required>
                    </div>
                    @error('s_c_HouseNo')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <!-- Street -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Street</label>
                        <input type="text" name="s_c_Street" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_Street }}" required>
                    </div>
                    @error('s_c_Street')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <!-- Barangay -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Barangay</label>
                        <input type="text" name="s_c_Barangay" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_Barangay }}" required>
                    </div>
                    @error('s_c_Barangay')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <!-- City -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="s_c_City" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_City }}" required>
                    </div>
                    @error('s_c_City')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <!-- Province -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Province</label>
                        <input type="text" name="s_c_Province" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_Province }}" required>
                    </div>
                    @error('s_c_Province')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror


                    </div>
                    <!-- Provincial Address -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Provincial Address</h2>

                        <!-- Provincial House No -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Provincial House No</label>
                            <input type="text" name="s_p_HouseNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_HouseNo }}" required>
                        </div>
                        @error('s_p_HouseNo')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <!-- Provincial Street -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Provincial Street</label>
                            <input type="text" name="s_p_Street" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_Street }}" required>
                        </div>
                        @error('s_p_Street')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <!-- Provincial Barangay -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Provincial Barangay</label>
                            <input type="text" name="s_p_Barangay" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_Barangay }}" required>
                        </div>
                        @error('s_p_Barangay')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <!-- Provincial City -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Provincial City</label>
                            <input type="text" name="s_p_City" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_City }}" required>
                        </div>
                        @error('s_p_City')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <!-- Provincial Province -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Provincial Province</label>
                            <input type="text" name="s_p_Province" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_Province }}" required>
                        </div>
                        @error('s_p_Province')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                </div>
                <!-- Emergency Contact Information -->
                 <div>
            <h2 class="text-xl font-semibold mb-4">Emergency Contact Information</h2>
                <!-- Contact Person Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Contact Person Name</label>
                    <input type="text" name="s_ContactPersonName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_ContactPersonName }}" required>
                </div>
                @error('s_ContactPersonName')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror

                <!-- Contact Person No -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Contact Person No</label>
                    <input type="text" name="s_ContactPersonNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_ContactPersonNo }}" required>
                </div>
                @error('s_ContactPersonNo')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Update Student Information
                </button>
                <a href={{ route('dashboard.showstudent', $student->s_id) }} class="bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-md gap-2">Cancel</a>
            </div>
        </form>
    </div>
</x-dashboard-layout>
