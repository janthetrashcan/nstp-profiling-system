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

    <!-- Top Action Bar -->
    <div class="flex flex-row pr-4 mb-3 justify-between">
        <!-- Left Actions: Add, Delete, Filter -->
        <div id="functions-lhs" class="flex flex-row gap-3">
            <!-- Add Button -->
            <a href="{{ route('dashboard.formatorlist') }}" id="return_button" class="hidden bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2">
                <x-carbon-arrow-left class="h-6" />
                <span class="font-semibold">Return</span>
            </a>

            <a href="{{ route('dashboard.addformator') }}" class="bg-blue-500 hover:bg-blue-600 text-white transition-colors duration-200 flex items-center h-12 px-4 py-2 rounded-lg gap-2">
                <x-carbon-add class="h-8" />
                <h2 class="font-semibold">Add</h2>
            </a>

            <!-- Delete Button -->
            <form action="{{ route('formator.destroy') }}" method="POST" id="deleteForm" class="">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2">
                    <x-carbon-trash-can class="h-6" />
                    <h1 class="font-semibold">Delete</h1>
                </button>
            </form>

            <!-- Filter Button -->
            <button id="filterButton" class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex items-center h-12 px-4 py-2 rounded-lg gap-2">
                <x-carbon-filter class="h-6" />
                <h1 class="font-semibold">Filter</h1>
            </button>
        </div>

        <!-- Right Actions: Search -->
        <form action="{{ route('dashboard.formatorlist') }}" method="GET" id="functions-rhs" class="flex flex-row gap-3">
            <input type="text" id="formator_search" name="formator_search" placeholder="Enter Name" maxlength="30" class="bg-gray-100 flex w-60 h-12 px-4 py-2 rounded-lg" value="{{ $search }}"/>
            <input type="submit" value="Search" class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 p-3 rounded-lg" />
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
                <th class="text-left p-4 w-2/12 font-semibold">Employee ID</th>
                <th class="text-left p-4 w-2/12 font-semibold">Family Name</th>
                <th class="text-left p-4 w-2/12 font-semibold">First Name</th>
                <th class="text-left p-4 w-2/12 font-semibold">Middle Name</th>

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
                            <input type="checkbox" name="formator_ids[]" value="{{ $formator->f_id }}" form="deleteForm" class="w-4 h-4">
                        </td>
                        <!-- Formator ID (employee_id) -->
                <td class="p-4 text-lg text-left">
                    <a href="{{ route('dashboard.showformator', $formator->f_id) }}">
                        {{ $formator->employee_id }}
                    </a>
                </td>
                        <!-- Formator Details -->
                        <td class="p-4 text-lg text-left">
                            <a href="{{ route('dashboard.showformator', $formator->f_id) }}" class="p-0 m-0">
                                {{ Str::upper($formator->f_Surname) }}
                            </a>
                        </td>
                        <td class="p-4 text-lg text-left">
                            <a href="{{ route('dashboard.showformator', $formator->f_id) }}">
                                {{ Str::upper($formator->f_FirstName) }}
                            </a>
                        </td>
                        <td class="p-4 text-lg text-left">
                            <a href="{{ route('dashboard.showformator', $formator->f_id) }}">
                                {{ Str::upper($formator->f_MiddleName) }}
                            </a>
                        </td>

                        <td class="p-4 text-lg text-left">
                            <a href="{{ route('dashboard.showformator', $formator->f_id) }}">
                                {{ $formator->f_TeachingYearStart }}
                            </a>
                        </td>
                        <td class="p-4 text-lg text-left">
                            <a href="{{ route('dashboard.showformator', $formator->f_id) }}">
                                {{ $formator->f_NSTPTeachingYearStart }}
                            </a>
                        </td>
                        <td class="p-4 text-lg text-center">
                            <a href="{{ route('dashboard.showformator', $formator->f_id) }}">
                                {{ $formator->f_TeachingUnitCount }}
                            </a>
                        </td>
                        <td class="p-4 text-lg text-left">
                            <a href="{{ route('dashboard.showformator', $formator->f_id) }}">
                                {{ Str::upper($formator->component->component_Name) }}
                            </a>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Section -->
    <div class="mt-6 flex justify-end">
        {{ $formators->links() }}
    </div>
    <script>
        function checkURL(){
            const url = window.location.href;
            return url.includes('formator_search')
        }

        document.addEventListener('DOMContentLoaded', function() {
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');
            const searchBar = document.getElementById('formator_search');
            const returnButton = document.getElementById('return_button');

            filterButton.addEventListener('click', function() {
                filterDropdown.classList.toggle('hidden');
            });

            if (searchBar && searchBar.value && checkURL()){
                returnButton.classList.toggle('hidden');
                returnButton.classList.add('flex');
            }
        });

    </script>
</x-dashboard-layout>
