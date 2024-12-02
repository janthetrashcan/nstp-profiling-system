<x-dashboard-layout>

    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href="{{ route('dashboard.studentlist') }}" class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-chevron-left class='h-8' />
                <h2 class='font-semibold'>Return</h2>
            </a>
            <form action="{{ route('student.destroy') }}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                    <x-carbon-trash-can class='h-6' />
                    <h1 class='font-semibold'>Delete</h1>
                </button>
            </form>
            {{-- <button class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex flex-row w-fit h-12 px-2 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-filter class='h-6' />
                <h1 class='font-semibold'>Filter</h1>
            </button> --}}
        </div>

        <form action="{{ route('dashboard.searchstudent') }}" method="GET" id="functions-rhs" class='flex flex-row gap-x-3'>
            <input type='text' name='search' placeholder='Search' maxlength='30' class='bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2' value="{{ $search }}" />
            <input type='submit' value='Search' class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 p-3 rounded-xl' />
        </form>
    </div>

    <!-- Table Structure -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-4 text-left w-[5%]">Select</th>
                    </th>
                    <th class="p-4 text-left w-1/12 font-semibold">Student ID</th>
                    <th class="p-4 text-left w-2/12 font-semibold">Family Name</th>
                    <th class="p-4 text-left w-2/12 font-semibold">First Name</th>
                    <th class="p-4 text-left w-2/12 font-semibold">Middle Name</th>
                    <th class="p-4 text-left w-1/12 font-semibold">Program</th>
                    <th class="p-4 text-left w-1/12 font-semibold">Component</th>
                    <th class="p-4 text-left w-1/12 font-semibold">Section</th>
                    <th class="text-left p-4 w-1/12 font-semibold">Grade</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($results) && is_countable($results) && count($results) > 0)
                    @foreach($results as $student)
                        <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                            <td class="p-4 text-center">
                                <input type="checkbox" name="student_ids[]" value="{{ $student->s_id }}" form="deleteForm" class="w-4 h-4" />
                            </td>
                            <td class="p-4">
                                <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg">
                                    {{ $student->s_StudentNo }}
                                </a>
                            </td>
                            <td class="p-4">
                                <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg">
                                    {{ Str::upper($student->s_Surname) }}
                                </a>
                            </td>
                            <td class="p-4">
                                <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg">
                                    {{ Str::upper($student->s_FirstName) }}
                                </a>
                            </td>
                            <td class="p-4">
                                <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg">
                                    {{ Str::upper($student->s_MiddleName) }}
                                </a>
                            </td>
                            <td class="p-4">
                                <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg">
                                    {{ Str::upper($student->program->program_Code) }}
                                </a>
                            </td>
                            <td class="p-4">
                                <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg">
                                    {{ Str::upper($student->component->component_Name) }}
                                </a>
                            </td>
                            <td class="p-4">
                                <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg">
                                    {{ Str::upper($student->section->sec_Section) }}
                            </td>
                            <td class="p-4">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg">
                        {{ $student->s_FinalGrade }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="p-4 text-center">No results found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</x-dashboard-layout>

