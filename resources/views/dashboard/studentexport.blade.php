<x-dashboard-layout>
    @if(session('warning'))
    <div class="bg-yellow-500 text-white p-3 rounded mb-4">
        {{ session('warning') }}
    </div>
    @endif


    <form action='{{ route('dashboard.exportstudents') }}'>
        <div class="flex flex-col gap-6 items-center mt-12">
            <!-- Large Box with Folded Corner Design -->
            <div class="relative w-[800px] h-auto bg-gray-100 rounded-lg shadow-lg border border-gray-300 p-6">
                <!-- Title Above Filters -->
                <h2 class="text-2xl font-semibold text-left mb-6">Filter</h2>

                <!-- Filters and Export Button Wrapper -->
                <div class="flex flex-col gap-8">
                    <!-- Filters Row -->
                    <div class="flex flex-row justify-center items-start gap-4">
                        <!-- Component Filter -->
                        <div class="flex flex-col w-80 h-auto gap-3 bg-gray-50 border-2 border-gray-300 rounded-lg p-4">
                            <h3 class="text-xl font-semibold text-center">Component</h3>
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
                        <div class="flex flex-col w-80 h-auto gap-3 bg-gray-50 border-2 border-gray-300 rounded-lg p-4">
                            <h3 class="text-xl font-semibold text-center">Section</h3>
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
                        <div class="flex flex-col w-80 h-auto gap-3 bg-gray-50 border-2 border-gray-300 rounded-lg p-4">
                            <h3 class="text-xl font-semibold text-center">Program</h3>
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
                    <div class='flex flex-row items-center gap-3'>
                        <input type="checkbox" id="include-failed" name="include-failed">
                        <label for="include-failed">Include Failed Students</label>
                    </div>

                    <!-- Export Button -->
                    <div class="flex justify-center gap-4">
                        <button type='submit' class="px-6 py-2 bg-blue-900 text-white font-semibold rounded-lg hover:bg-blue-800 transition duration-300">
                            Export
                        </button>
                        <a href="{{ route('dashboard.studentlist') }}" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                            Cancel
                        </a>

                        </div>
                </div>
            </div>
        </div>
    </form>
</x-dashboard-layout>
