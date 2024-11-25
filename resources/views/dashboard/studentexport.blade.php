<x-dashboard-layout>
    <div class="flex flex-col gap-6 items-center mt-12">
        <!-- Large Box with Folded Corner Design -->
        <div class="relative w-[800px] h-auto bg-gray-100 rounded-lg shadow-lg border border-gray-300 p-6">
            <!-- Title Above Filters -->
            <h2 class="text-2xl font-semibold text-left mb-6">Filter</h2>

            <!-- Filters and Export Button Wrapper -->
            <div class="flex flex-col gap-8">
                <!-- Filters Row -->
                <div class="flex flex-row justify-center items-start gap-6">
                    <!-- Component Filter -->
                    <div class="flex flex-col w-80 h-auto gap-3 bg-gray-50 border-2 border-gray-500 rounded-lg p-4">
                        <h3 class="text-xl font-semibold text-center">Component</h3>
                        <select id='component-filter' name='component-filter' class="border p-2 rounded-md">
                            <option value='all'>All components</option>
                            @foreach($components as $component)
                                <option value="{{ $component }}" {{ request('component') == $component ? 'selected' : '' }}>
                                    {{ Str::upper($component) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Section Filter -->
                    <div class="flex flex-col w-80 h-auto gap-3 bg-gray-50 border-2 border-gray-500 rounded-lg p-4">
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
                    <div class="flex flex-col w-80 h-auto gap-3 bg-gray-50 border-2 border-gray-500 rounded-lg p-4">
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

                <!-- Export Button -->
                <div class="flex justify-center">
                    <form action='{{ route('dashboard.exportstudents') }}'>
                        <button type='submit' class="px-6 py-2 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition duration-300">
                            Export
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
=======
    <div class='flex flex-col gap-5'>
        <h1 class="text-3xl font-bold">Export Students</h1>

        <form action='{{ route('dashboard.exportstudents') }}' class='flex flex-col gap-5'>
            <h2 class='text-2xl font-semibold'>Filter</h2>

            <div class='flex flex-row gap-3 w-72'>
                <div class='flex flex-col gap-2 flex-1'>
                    <label for='component-filter'>Component</label>
                    <select id='component-filter' name='component-filter'>
                        <option value='all'>All components</option>
                        @foreach($components as $component)
                        <option value="{{ $component }}" {{ request('component') == $component ? 'selected' : '' }}>
                            {{ Str::upper($component) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class='flex flex-col gap-2 flex-1'>
                    <label for='section-filter'>Section</label>
                    <select id='section-filter' name='section-filter'>
                        <option value='all'>All sections</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->sec_id }}" {{ request('section') == $section->sec_id ? 'selected' : '' }}>
                                {{ $section->sec_Section }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class='flex flex-col gap-2 flex-1'>
                    <label for='program-filter'>Program</label>
                    <select id='program-filter' name='program-filter'>
                        <option value='all'>All programs</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->program_id}}" {{ request('program') == $program->program_id ? 'selected' : '' }}>
                                {{ $program->program_Code }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <button type='submit' class="bg-gray-200 hover:bg-gray-300 transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md mb-6">
                Export
            </button>
        </form>
    </div>
</x-dashboard-layout>
