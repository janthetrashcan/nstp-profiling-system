<x-dashboard-layout>
    <!-- Top Action Bar -->
    <div class="flex flex-row pr-4 mb-3 justify-between">
        <!-- Left Actions: Add, Delete, Filter -->
        <div id="functions-lhs" class="flex flex-row gap-3">
            <!-- Add Button -->
            <a href="{{ route('dashboard.addformator') }}" class="bg-blue-500 hover:bg-blue-600 text-white transition-colors duration-200 flex items-center h-12 px-4 py-2 rounded-xl gap-2">
                <x-carbon-add class="h-8" />
                <h2 class="font-semibold">Add</h2>
            </a>

            <!-- Delete Button -->
            <form action="{{ route('formator.destroy') }}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-colors duration-200 flex items-center h-12 px-4 py-2 rounded-xl gap-2 shadow-md">
                    <x-carbon-trash-can class="h-6" />
                    <h1 class="font-semibold">Delete</h1>
                </button>
            </form>

            <!-- Filter Button -->
            <button id="filterButton" class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex items-center h-12 px-2 py-2 rounded-xl gap-2">
                <x-carbon-filter class="h-6" />
                <h1 class="font-semibold">Filter</h1>
            </button>
        </div>

        <!-- Right Actions: Search -->
        <form action="{{ route('dashboard.searchstudent') }}" method="GET" id="functions-rhs" class="flex flex-row gap-3">
            <input type="text" name="search" placeholder="Enter Name or Student No." maxlength="30" class="bg-gray-100 flex w-60 h-12 px-4 py-2 rounded-xl" />
            <input type="submit" value="Search" class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 p-3 rounded-xl" />
        </form>
    </div>

    <!-- Filter Dropdown -->
    <div id="filterDropdown" class="hidden mb-4 p-4 bg-white rounded-xl shadow-md">
        <form action="{{ route('dashboard.formatorlist') }}" method="GET" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <div>
                <label for="component" class="block mb-2">Component</label>
                <select name="component" id="component" class="w-full p-2 border rounded">
                    <option value="">All</option>
                    <option value="cwts">CWTS</option>
                    <option value="rotc">ROTC</option>
                    <option value="lts">LTS</option>
                </select>
            </div>
            <div>
                <label for="active_teaching" class="block mb-2">Active Teaching</label>
                <select name="active_teaching" id="active_teaching" class="w-full p-2 border rounded">
                    <option value="">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div>
                <label for="employment_status" class="block mb-2">Employment Status</label>
                <select name="employment_status" id="employment_status" class="w-full p-2 border rounded">
                    <option value="">All</option>
                    <option value="hired">Hired</option>
                    <option value="not hired">Not Hired</option>
                </select>
            </div>
            <div>
                <label for="teaching_year_start" class="block mb-2">Teaching Year Start</label>
                <input type="number" name="teaching_year_start" id="teaching_year_start" class="w-full p-2 border rounded" placeholder="YYYY">
            </div>
            <div>
                <label for="nstp_teaching_year" class="block mb-2">NSTP Teaching Year</label>
                <input type="number" name="nstp_teaching_year" id="nstp_teaching_year" class="w-full p-2 border rounded" placeholder="YYYY">
            </div>
            <div class="col-span-2 md:col-span-3 lg:col-span-5">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Apply Filters</button>
                <a href="{{ route('dashboard.formatorlist') }}" class="ml-2 text-blue-500 hover:underline">Clear Filters</a>
            </div>
        </form>
    </div>

    <!-- Table Structure -->
    <table class="min-w-full bg-white rounded-lg">
        <!-- Table Header -->
        <thead class="bg-gray-200">
            <tr>
                <th class="p-4 text-center w-4">Select</th>
                <th class="text-left p-4 w-2/12 font-semibold">Family Name</th>
                <th class="text-left p-4 w-2/12 font-semibold">First Name</th>
                <th class="text-left p-4 w-2/12 font-semibold">Middle Name</th>
                <th class="text-left p-4 w-1/12 font-semibold">Age</th>
                <th class="text-left p-4 w-2/12 font-semibold">Teaching Year Start</th>
                <th class="text-left p-4 w-2/12 font-semibold">NSTP Teaching Year Start</th>
                <th class="text-left p-4 w-1/12 font-semibold">Units Count</th>
                <th class="text-left p-4 w-1/12 font-semibold">Component</th>
            </tr>
        </thead>

        <!-- Table Body -->
        <tbody>
            @foreach($formators as $formator)
            <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                <!-- Delete Checkbox -->
                <td class="p-4 text-center">
                    <input type="checkbox" name="student_ids[]" value="{{ $formator->f_id }}" form="deleteForm" class="w-4 h-4">
                </td>

                <!-- Formator Details -->
                <td class="p-4 text-lg text-left">{{ Str::upper($formator->f_Surname) }}</td>
                <td class="p-4 text-lg text-left">{{ Str::upper($formator->f_FirstName) }}</td>
                <td class="p-4 text-lg text-left">{{ Str::upper($formator->f_MiddleName) }}</td>
                <td class="p-4 text-lg text-center">{{ $formator->f_Age }}</td>
                <td class="p-4 text-lg text-left">{{ $formator->f_TeachingYearStart }}</td>
                <td class="p-4 text-lg text-left">{{ $formator->f_NSTPTeachingYearStart }}</td>
                <td class="p-4 text-lg text-center">{{ $formator->f_TeachingUnitCount }}</td>
                <td class="p-4 text-lg text-left">{{ Str::upper($formator->f_Component) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Section -->
    <div class="mt-6 flex justify-end">
        {{ $formators->links() }}
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');

            filterButton.addEventListener('click', function() {
                filterDropdown.classList.toggle('hidden');
            });
        });
    </script>
</x-dashboard-layout>
