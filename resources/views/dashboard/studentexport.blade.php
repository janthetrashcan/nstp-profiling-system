<x-dashboard-layout>
    <a href="{{ route('dashboard.studentlist') }}" class="bg-gray-200 hover:bg-gray-300 transition-all duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-lg gap-2 shadow-md mb-6">
        <x-carbon-arrow-left class="h-6" />
        <h1 class="font-semibold">Return</h1>
    </a>

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
