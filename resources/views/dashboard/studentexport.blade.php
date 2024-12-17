<x-dashboard-layout>
    @if(session('warning'))
    <div class="bg-yellow-500 text-white p-3 rounded mb-4">
        {{ session('warning') }}
    </div>
    @endif


    <form action='{{ route('dashboard.exportstudents') }}' class=''>
        <div class="flex flex-col gap-6 items-center mt-12">
            <!-- Large Box with Folded Corner Design -->
            <div class="flex flex-col gap-6 relative w-[50%] h-auto bg-gray-100 rounded-lg shadow-lg border border-gray-300 p-6">

                <h1 class="text-3xl font-semibold text-left">Export Data</h1>

                <div class=''>
                    <h3 class="text-xl font-semibold text-left mb-4">Academic Year</h3>
                    <select id='component-filter' name='component-filter' class="border p-2 rounded-md w-[100%]">
                        <option value='select'>Select</option>
                        @foreach($components as $component)
                            <option value="{{ $component->component_id }}" {{ request('component') == $component ? 'selected' : '' }}>
                                {{ Str::upper($component->component_Name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class='w-fill h-[1px] bg-gray-800 opacity-20 ml-4 mr-4 mt-2'>
                </div>


                <div class='flex flex-col gap-3'>
                    <!-- Title Above Filters -->
                    <div class="flex flex-col w-fill h-fill gap-3 bg-gray-50 border-2 border-gray-300 rounded-lg p-4 mb-4">
                        <label class="flex flex-row justify-start gap-4 items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" name='student-export' checked>
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>

                            <span class="text-2xl font-semibold text-left text-gray-300 dark:text-gray-900">
                                <h2 class="select-none">Students</h2>
                            </span>
                        </label>
                    </div>

                    <div class='px-4'>
                        <!-- Filters and Export Button Wrapper -->
                        <div class="flex flex-col gap-8">
                            <!-- Filters Row -->
                            <div class="flex flex-row justify-center items-start gap-4">
                                <!-- Component Filter -->
                                <div class="flex flex-col w-80 h-auto gap-3 rounded-lg">
                                    <h3 class="text-xl font-semibold text-left">Component</h3>
                                    <select id='component-filter' name='component-filter' class="border p-2 rounded-md">
                                        <option value='all'>All components</option>
                                        @foreach($components as $component)
                                            <option value="{{ $component->component_id }}" {{ request('component') == $component ? 'selected' : '' }}>
                                                {{ Str::upper($component->component_Name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Section Filter -->
                                <div class="flex flex-col w-80 h-auto gap-3 rounded-lg">
                                    <h3 class="text-xl font-semibold text-left">Section</h3>
                                    <select id='section-filter' name='section-filter' class="border p-2 rounded-md">
                                        <option value='all'>All sections</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->sec_id }}" {{ request('section') == $section->sec_id ? 'selected' : '' }}>
                                                {{ $section->sec_Section }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Program Filter -->
                                <div class="flex flex-col w-80 h-auto gap-3 rounded-lg">
                                    <h3 class="text-xl font-semibold text-left">Program</h3>
                                    <select id='program-filter' name='program-filter' class="border p-2 rounded-md">
                                        <option value='all'>All programs</option>
                                        @foreach($programs as $program)
                                            <option value="{{ $program->program_id }}" {{ request('program') == $program->program_id ? 'selected' : '' }}>
                                                {{ $program->program_Code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Include Failed Students Checkbox -->

                            <div id='export-preferences' class='flex flex-col gap-4'>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer" name='include-failed'>
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 font-normal text-gray-300 dark:text-gray-900">Include failed students</span>
                                </label>

                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer" name='multisheet-export' checked>
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 font-normal text-gray-300 dark:text-gray-900">Multisheet Export</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='w-fill h-[1px] bg-gray-800 opacity-20 ml-4 mr-4 mt-2'>
                </div>


                {{-- Formators --}}
                <!-- Title Above Filters -->
                <div class='flex flex-col gap-3'>
                    <div class="flex flex-col w-fill h-fill gap-3 bg-gray-50 border-2 border-gray-300 rounded-lg p-4 mb-4">
                        <label class="flex flex-row justify-start gap-4 items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" name='student-export' checked>
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>

                            <span class="text-2xl font-semibold text-left text-gray-300 dark:text-gray-900">
                                <h2 class="select-none">Formators</h2>
                            </span>
                        </label>
                    </div>

                    <div class='pl-4'>
                        <!-- Filters and Export Button Wrapper -->
                        <div class="flex flex-col gap-8">
                            <!-- Filters Row -->
                            <div class="flex flex-row justify-center items-start gap-4">
                                <!-- Component Filter -->
                                <div class="flex flex-col w-80 h-auto gap-3 rounded-lg">
                                    <h3 class="text-xl font-semibold text-left">Component</h3>
                                    <select id='component-filter' name='component-filter' class="border p-2 rounded-md">
                                        <option value='all'>All components</option>
                                        @foreach($components as $component)
                                            <option value="{{ $component->component_id }}" {{ request('component') == $component ? 'selected' : '' }}>
                                                {{ Str::upper($component->component_Name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Section Filter -->
                                <div class="flex flex-col w-80 h-auto gap-3 rounded-lg">
                                    <h3 class="text-xl font-semibold text-left">Teaching Status</h3>
                                    <select id='section-filter' name='section-filter' class="border p-2 rounded-md">
                                        <option value='all'>All formators</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->sec_id }}" {{ request('section') == $section->sec_id ? 'selected' : '' }}>
                                                {{ $section->sec_Section }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Program Filter -->
                                <div class="flex flex-col w-80 h-auto gap-3 rounded-lg">
                                    <h3 class="text-xl font-semibold text-left">Filter</h3>
                                    <select id='program-filter' name='program-filter' class="border p-2 rounded-md">
                                        <option value='all'>f</option>
                                        @foreach($programs as $program)
                                            <option value="{{ $program->program_id }}" {{ request('program') == $program->program_id ? 'selected' : '' }}>
                                                {{ $program->program_Code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Include Failed Students Checkbox -->

                            <div id='export-preferences' class='flex flex-col gap-4'>
                                {{-- <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer" name='include-failed'>
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 font-normal text-gray-300 dark:text-gray-900">Include failed students</span>
                                </label> --}}
                            </div>
                        </div>
                    </div>

                    <div class='w-fill h-[1px] bg-gray-800 opacity-20 ml-4 mr-4 mt-2'>
                    </div>

                </div>

                <!-- Export Button -->
                <div class="flex justify-end gap-3">
                    <button type='submit' class="px-6 py-2 bg-blue-900 text-white font-semibold rounded-lg hover:bg-blue-800 transition duration-300">
                        Export
                    </button>
                    <a href="{{ route('dashboard.studentlist') }}" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                        Cancel
                    </a>
                </div>

            </div>
        </div>
    </form>
</x-dashboard-layout>
