@if(isset($programs) && $programs->isNotEmpty() && isset($components) && $components->isNotEmpty() && isset($sections) && $sections->isNotEmpty())
    <div id="filterForm" class="mb-4 {{ request('program') || request('component') || request('section') || request('status') || request('grade') ? '' : 'hidden' }}">
        <form action="{{ route('dashboard.filterstudents') }}" method="GET" class="flex flex-wrap items-center space-x-2 space-y-2">
            <select name="program" id="program-select" class="bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                <option value="">Select Program</option>
                @foreach($programs as $program)
                    <option value="{{ $program->program_id }}" {{ request('program') == $program->program_id ? 'selected' : '' }}>
                        {{ $program->program_Code }}
                    </option>
                @endforeach
            </select>

            <select name="component" id="component-select" class="bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                <option value="">Select Component</option>
                @foreach($components as $component)
                    <option value="{{ $component }}" {{ request('component') == $component ? 'selected' : '' }}>
                        {{ $component }}
                    </option>
                @endforeach
            </select>

            <select name="section" id="section-select" class="bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                <option value="">Select Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->sec_id }}" {{ request('section') == $section->sec_id ? 'selected' : '' }}>
                        {{ $section->sec_Section }}
                    </option>
                @endforeach
            </select>

            <select name="status" id="status-select" class="bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
                <option value="">Select Status</option>
                <option value="passed" {{ request('status') == 'passed' ? 'selected' : '' }}>Passed</option>
                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
    
            <select name="grade" id="grade-select" class="bg-gray-100 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2" {{ request('status') != 'passed' ? 'disabled' : '' }}>
                <option value="">Select Grade</option>
                @foreach([1, 1.5, 2, 2.5, 3, 3.5, 4] as $grade)
                    <option value="{{ $grade }}" {{ request('grade') == $grade ? 'selected' : '' }}>
                        {{ $grade }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white transition-colors duration-200 p-3 rounded-xl">Apply Filter</button>
            
            @if(request('program') || request('component') || request('section') || request('status') || request('grade'))
                <a href="{{ route('dashboard.studentlist') }}" class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 p-3 rounded-xl">Clear Filter</a>
            @endif
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status-select');
            const gradeSelect = document.getElementById('grade-select');
        
            function updateGradeSelect() {
                if (statusSelect.value === 'passed') {
                    gradeSelect.disabled = false;
                } else {
                    gradeSelect.disabled = true;
                    gradeSelect.value = '';
                }
            }
        
            statusSelect.addEventListener('change', updateGradeSelect);
        
            // Initial update in case of page reload with existing selections
            updateGradeSelect();
        });
        </script>

@else
    <div class="mb-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
        <p class="font-bold">Warning</p>
        <p>Filter options are not available. Please contact the administrator.</p>
    </div>
@endif