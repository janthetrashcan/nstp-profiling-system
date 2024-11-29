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
                            <label for="employee_id" class="block text-sm font-medium text-gray-700">Formator No</label>
                            <input type="text" name="employee_id" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_Number }}" required />
                        </div>
                        <div>
                            <label for="f_Surname" class="block text-sm font-medium text-gray-700">Family Name</label>
                            <input type="text" name="f_Surname" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_Surname }}" required />
                        </div>
                        <div>
                            <label for="f_FirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="f_FirstName" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_FirstName }}" required />
                        </div>
                        <div>
                            <label for="f_MiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" name="f_MiddleName" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_MiddleName }}" />
                        </div>
                        <div>
                            <label for="f_Sex" class="block text-sm font-medium text-gray-700">Sex</label>
                            <select name="f_Sex" class="mt-1 p-2 border rounded w-full" required>
                                <option value="male" {{ $formator->f_Sex == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $formator->f_Sex == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="f_Birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                            <input type="date" name="f_Birthdate" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_Birthdate }}" required />
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="border-b pb-4 mb-4">
                    <div class="grid grid-cols-3 gap-4"> <!-- Changed to 3 columns -->
                        <div>
                            <label for="f_ContactNo" class="block text-sm font-medium text-gray-700">Contact No</label>
                            <input type="text" name="f_ContactNo" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_ContactNo }}" required />
                        </div>
                        <div>
                            <label for="f_EmailAddress" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="f_EmailAddress" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_EmailAddress }}" required />
                        </div>
                    </div>
                </div>

                <!-- Teaching Information Section -->
                <div>
                    <div class="grid grid-cols-3 gap-4"> <!-- Changed to 3 columns -->
                        <div>
                            <label for="f_TeachingYearStart" class="block text-sm font-medium text-gray-700">Teaching Year Start</label>
                            <input type="text" name="f_TeachingYearStart" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_TeachingYearStart }}" required />
                        </div>
                        <div>
                            <label for="f_TeachingUnitCount" class="block text-sm font-medium text-gray-700">Teaching Unit Count</label>
                            <input type="text" name="f_TeachingUnitCount" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_TeachingUnitCount }}" required />
                        </div>
                        <div>
                            <label for="f_NSTPTeachingYearStart" class="block text-sm font-medium text-gray-700">NSTP Teaching Year Start</label>
                            <input type="text" name="f_NSTPTeachingYearStart" class="mt-1 p-2 border rounded w-full" value="{{ $formator->f_NSTPTeachingYearStart }}" required />
                        </div>
                        <div>
                            <label for="component_id" class="block text-sm font-medium text-gray-700">Component</label>
                            <select id="component_id" name="component_id" required class="mt-1 p-2 border rounded w-full" value="{{ $formator->component_id }}">
                                <option value="">Select component</option>
                                @foreach($components as $component)
                                <option value="{{ $component->component_id }}">{{ $component->component_Name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="f_ActiveTeaching" class="block text-sm font-medium text-gray-700">Active Teaching</label>
                            <select name="f_ActiveTeaching" class="mt-1 p-2 border rounded w-full" required>
                                <option value="active" {{ $formator->f_EmploymentStatus == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $formator->f_EmploymentStatus == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div>
                            <label for="f_EmploymentStatus" class="block text-sm font-medium text-gray-700">Employment Status</label>
                            <select name="f_EmploymentStatus" class="mt-1 p-2 border rounded w-full" required>
                                <option value="hired" {{ $formator->f_EmploymentStatus == 'hired' ? 'selected' : '' }}>Hired</option>
                                <option value="not hired" {{ $formator->f_EmploymentStatus == 'not hired' ? 'selected' : '' }}>Not Hired</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded-lg font-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
