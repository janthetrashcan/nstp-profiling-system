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

    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href="{{ route('dashboard.addstudent', ['batch' => request('batch')]) }}" class='bg-blue-500 hover:bg-blue-600 text-white transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2'>
                <x-carbon-add class='h-8' />
                <h2 class='font-semibold'>Add</h2>
            </a>

            <form action="{{ route('student.destroy') }}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2">
                    <x-carbon-trash-can class='h-6' />
                    <h1 class='font-semibold'>Delete</h1>
                </button>
            </form>

            <button id="filterToggle" class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2'>
                <x-carbon-filter class='h-6' />
                <h1 class='font-semibold'>Filter</h1>
            </button>
        </div>

        <form action="{{ route('dashboard.studentlist', ['batch' => request('batch')]) }}" method='GET' id='functions-rhs' class='flex flex-row gap-x-3'>
            <input type='text' id='search' name='search' placeholder='Enter Name or Student No.' value="{{ request('search') }}" maxlength='30' class='bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-lg gap-2' />
            <input type='text' name='batch' value='{{ request('batch') }}' class='hidden'>
            <input type='submit' value='Search' class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 p-3 rounded-lg' />
        </form>
    </div>

    @include('dashboard.studentfilter', ['programs' => $programs, 'components' => $components, 'sections' => $sections, 'grades' => [1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5]])
    <!-- Table Structure -->
    <table class="min-w-full bg-white rounded-lg">
        <thead class="bg-gray-200 h-[2rem]">
            <tr>
                <th class="w-fit text-left"></th>
                <th class="text-left p-4 w-1/12 font-semibold">
                    <a href="{{ route('dashboard.studentlist', ['sort' => 's_StudentNo', 'direction' => ($sortColumn === 's_StudentNo' && $sortDirection === 'asc') ? 'desc' : 'asc'] + request()->query()) }}">
                        Student ID
                        @if ($sortColumn === 's_StudentNo')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </a>
                </th>
                <th class="text-left p-4 w-2/12 font-semibold">
                    <a href="{{ route('dashboard.studentlist', ['sort' => 's_Surname', 'direction' => ($sortColumn === 's_Surname' && $sortDirection === 'asc') ? 'desc' : 'asc'] + request()->query()) }}">
                        Family Name
                        @if ($sortColumn === 's_Surname')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </a>
                </th>
                <th class="text-left p-4 w-2/12 font-semibold">
                    <a href="{{ route('dashboard.studentlist', ['sort' => 's_FirstName', 'direction' => ($sortColumn === 's_FirstName' && $sortDirection === 'asc') ? 'desc' : 'asc'] + request()->query()) }}">
                        First Name
                        @if ($sortColumn === 's_FirstName')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </a>
                </th>
                <th class="text-left p-4 w-2/12 font-semibold">
                    <a href="{{ route('dashboard.studentlist', ['sort' => 's_MiddleName', 'direction' => ($sortColumn === 's_MiddleName' && $sortDirection === 'asc') ? 'desc' : 'asc'] + request()->query()) }}">
                        Middle Name
                        @if ($sortColumn === 's_MiddleName')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </a>
                </th>
                <th class="text-left p-4 w-1/12 font-semibold">
                    <a href="{{ route('dashboard.studentlist', ['sort' => 's_Surname', 'direction' => ($sortColumn === 's_Surname' && $sortDirection === 'asc') ? 'desc' : 'asc'] + request()->query()) }}">
                        Program
                        @if ($sortColumn === 's_Surname')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </a>
                </th>
                <th class="text-left p-4 w-1/12 font-semibold">
                    <a href="{{ route('dashboard.studentlist', ['sort' => 's_Surname', 'direction' => ($sortColumn === 's_Surname' && $sortDirection === 'asc') ? 'desc' : 'asc'] + request()->query()) }}">
                        Component
                        @if ($sortColumn === 's_Surname')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </a>
                </th>
                <th class="text-left p-4 w-1/12 font-semibold">
                    <a href="{{ route('dashboard.studentlist', ['sort' => 'sec_id', 'direction' => ($sortColumn === 'sec_id' && $sortDirection === 'asc') ? 'desc' : 'asc'] + request()->query()) }}">
                        Section
                        @if ($sortColumn === 'sec_id')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </a>
                </th>
                <th class="text-left p-4 w-1/12 font-semibold">
                    <a href="{{ route('dashboard.studentlist', ['sort' => 's_FinalGrade', 'direction' => ($sortColumn === 's_FinalGrade' && $sortDirection === 'asc') ? 'desc' : 'asc'] + request()->query()) }}">
                        Grade
                        @if ($sortColumn === 's_FinalGrade')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </a>
                </th>
            </tr>
        </thead>

        @if($students->isNotEmpty())
        <tbody id="studentTableBody">
            @foreach($students as $student)
            <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                <td class="text-center w-[2%] px-4">
                    <input type='checkbox' name='student_ids[]' value='{{ $student->s_id }}' form="deleteForm" class='student-checkbox w-4 h-4'>
                </td>
                <td class="p-4">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}" class="text-lg overflow-x-hidden outline-r-2">
                        {{ $student->s_StudentNo }}
                    </a>
                </td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}">
                        {{ Str::upper($student->s_Surname) }}
                    </a>
                </td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}">
                        {{ Str::upper($student->s_FirstName) }}
                    </a>
                </td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}">
                        {{ Str::upper($student->s_MiddleName) }}
                    </a>
                </td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}">
                        {{ Str::upper($student->program->program_Code) }}
                    </a>
                </td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}">
                        {{ Str::upper($student->component->component_Name) }}
                    </a>
                </td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}">
                        {{ Str::upper($student->section->sec_Section) }}
                    </a>
                </td>
                <td class="p-4 text-lg overflow-x-hidden outline-r-2">
                    <a href="{{ route('dashboard.showstudent', $student->s_id) }}">
                        {{ $student->s_FinalGrade }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

        @else
        </table>
        <div class='w-fill'>
            <h2 class='text-xl text-center mt-8'>No results found</h2>
        </div>
        @endif
    </table>
    <div class="mt-6 flex justify-end">
        {{ $students->appends(request()->query())->links() }}
    </div>

    <script>
        document.getElementById('filterToggle').addEventListener('click', function() {
            var filterForm = document.getElementById('filterForm');
            filterForm.classList.toggle('hidden');
        });

        // Sorting functionality
        const tableHeaders = document.querySelectorAll('th[data-sort]');
        let currentSort = { column: '', direction: 'asc' };

        tableHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const column = header.dataset.sort;
                const direction = currentSort.column === column && currentSort.direction === 'asc' ? 'desc' : 'asc';

                sortTable(column, direction);

                currentSort = { column, direction };
                updateSortIndicators();
            });
        });

        function sortTable(column, direction) {
            const tbody = document.getElementById('studentTableBody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            const sortedRows = rows.sort((a, b) => {
                const aValue = a.querySelector(`td:nth-child(${getColumnIndex(column)})`).textContent.trim();
                const bValue = b.querySelector(`td:nth-child(${getColumnIndex(column)})`).textContent.trim();

                if (column === 's_StudentNo') {
                    return direction === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
                } else if (column === 's_FinalGrade') {
                    return direction === 'asc' ? compareGrades(aValue, bValue) : compareGrades(bValue, aValue);
                } else {
                    return direction === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
                }
            });

            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }

            sortedRows.forEach(row => tbody.appendChild(row));
        }

        function getColumnIndex(column) {
            const columnMap = {
                's_StudentNo': 2,
                's_Surname': 3,
                's_FirstName': 4,
                's_MiddleName': 5,
                'program_Code': 6,
                'component_Name': 7,
                'sec_Section': 8,
                's_FinalGrade': 9
            };
            return columnMap[column];
        }

        function compareGrades(a, b) {
            const gradeOrder = ['4', '3.5', '3', '2.5', '2', '1.5', '1', 'F'];
            return gradeOrder.indexOf(a) - gradeOrder.indexOf(b);
        }

        function updateSortIndicators() {
            tableHeaders.forEach(header => {
                header.classList.remove('sort-asc', 'sort-desc');
                if (header.dataset.sort === currentSort.column) {
                    header.classList.add(`sort-${currentSort.direction}`);
                }
            });
        }

        // document.addEventListener('DOMContentLoaded', function() {
        //     // Select all checkbox functionality
        //     // const selectAll = document.getElementById('select-all');
        //     const studentCheckboxes = document.querySelectorAll('.student-checkbox');

        //     // selectAll.addEventListener('change', function() {
        //     //     studentCheckboxes.forEach(checkbox => {
        //     //         checkbox.checked = selectAll.checked;
        //     //     });
        //     // });

        //     // Bulk modal trigger
        //     const openDeleteModal = document.getElementById('open-delete-modal');

        //     openDeleteModal.addEventListener('click', function() {
        //         // Collect all checked item IDs
        //         const checkedStudents = Array.from(
        //             document.querySelectorAll('.student-checkbox:checked')
        //         ).map(checkbox => checkbox.value);

        //         // Only proceed if items are selected
        //         if (checkedStudents.length > 0) {
        //             // Use Livewire dispatch to open modal with selected items
        //             Livewire.dispatch('student-multi-remove-confirmation', {
        //                 'studentIds': checkedStudents.join(',')
        //             });
        //         } else {
        //             alert('Please select at least one item');
        //         }
        //     });
        // });
    </script>
</x-dashboard-layout>
