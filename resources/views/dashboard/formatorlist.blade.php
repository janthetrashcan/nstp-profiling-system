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
            <button class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex items-center h-12 px-2 py-2 rounded-xl gap-2">
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

    <!-- Table Structure -->
    <table class="min-w-full bg-white rounded-lg">
        <!-- Table Header -->
        <thead class="bg-gray-200">
            <tr>
                <th class="p-4 text-center w-4">Select</th>
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
                                {{ Str::upper($formator->f_Component) }}
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
</x-dashboard-layout>
