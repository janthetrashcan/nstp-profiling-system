<x-dashboard-layout>
    @if(session('error'))
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href="{{ route('dashboard.addstudent') }}" class='bg-blue-500 hover:bg-blue-600 text-white transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-add class='h-8' />
                <h2 class='font-semibold'>Add</h2>
            </a>
            <form action="{{ route('student.destroy') }}" method="POST" id="deleteForm" >
                @csrf
                @method('DELETE')
                <button type="submit" type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md">
                    <x-carbon-trash-can class='h-6' />
                    <h1 class='font-semibold'>Delete</h1>
                </>
            </form>
            <button class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex flex-row w-fit h-12 px-2 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-filter class='h-6' />
                <h1 class='font-semibold'>Filter</h1>
            </button>
        </div>

        <form action={{ route('dashboard.searchstudent') }} method='GET' id='functions-rhs' class='flex flex-row gap-x-3'>
            <input type='text' name='search' placeholder='Enter Name or Student No.' maxlength='30' class='bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2' />
            <input type='submit' value='Search' class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 p-3 rounded-xl' />
        </form>
    </div>

    <!-- Table Structure -->
    <table class="min-w-full bg-white rounded-lg">
        <!-- Table Header -->
        <thead class="bg-gray-200">
            <tr>
                <th class="flex justify-right w-4 p-4 text-left">Select</th>
                <th class="text-left p-4 w-1/12 font-semibold">Student ID</th>
                <th class="text-left p-4 w-2/12 font-semibold">Family Name</th>
                <th class="text-left p-4 w-2/12 font-semibold">First Name</th>
                <th class="text-left p-4 w-2/12 font-semibold">Middle Name</th>
                <th class="text-left p-4 w-1/12 font-semibold">Program</th>
                <th class="text-left p-4 w-1/12 font-semibold">Component</th>
                <th class="text-left p-4 w-1/12 font-semibold">Section</th>
            </tr>
        </thead>

        <!-- Table Body -->
        <tbody>
            @foreach($students as $student)
            <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                <!-- Delete Checkbox -->
                <td class="p-4 text-center">
                    <input type='checkbox' name='student_ids[]' value='{{ $student->s_id }}' form="deleteForm" class='w-4 h-4'>
                </td>

                <td class="p-4">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg overflow-x-hidden outline-r-2">
                        {{ $student->s_StudentNo }}
                    </a>
                </td>

                <td class="p-4 text-lg overflow-x-hidden outline-r-2">{{ Str::upper($student->s_Surname) }}</td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">{{ Str::upper($student->s_FirstName) }}</td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">{{ Str::upper($student->s_MiddleName) }}</td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">{{ Str::upper($student->program->program_Code) }}</td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">{{ Str::upper($student->section->sec_Component) }}</td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">{{ Str::upper($student->section->sec_Section) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-6 flex justify-end">
        {{ $students->links() }}
    </div>
</x-dashboard-layout>
