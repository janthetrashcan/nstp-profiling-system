@if(isset($programs) && $programs->isNotEmpty() && isset($components) && $components->isNotEmpty() && isset($sections) && $sections->isNotEmpty())

    <div id="filterForm" class="mb-4 {{ request('program') || request('component') || request('section') ? '' : 'hidden' }}">
        <form action="{{ route('dashboard.filterstudents') }}" method="GET" class="flex items-center space-x-2">
            <select name="program" class="bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                <option value="">Select Program</option>
                @foreach($programs as $program)
                    <option value="{{ $program->program_id }}" {{ request('program') == $program->program_id ? 'selected' : '' }}>
                        {{ $program->program_Code }}
                    </option>
                @endforeach
            </select>
            <select name="component" class="bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                <option value="">Select Component</option>
                @foreach($components as $component)
                    <option value="{{ $component }}" {{ request('component') == $component ? 'selected' : '' }}>
                        {{ $component }}
                    </option>
                @endforeach
            </select>
            <select name="section" class="bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                <option value="">Select Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->sec_id }}" {{ request('section') == $section->sec_id ? 'selected' : '' }}>
                        {{ $section->sec_Section }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white transition-colors duration-200 p-3 rounded-xl">Apply Filter</button>
            @if(request('program') || request('component') || request('section'))
                <a href="{{ route('dashboard.studentlist') }}" class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 p-3 rounded-xl">Clear Filter</a>
            @endif
        </form>
    </div>
@else
    <div class="mb-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
        <p class="font-bold">Warning</p>
        <p>Filter options are not available. Please contact the administrator.</p>
    </div>
@endif