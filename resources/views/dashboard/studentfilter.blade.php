@if(isset($batches) && $batches->isNotEmpty() && isset($programs) && $programs->isNotEmpty() && isset($components) && $components->isNotEmpty() && isset($sections) && $sections->isNotEmpty())
    <div id="filterForm" class="mb-4 p-4 bg-white rounded-xl shadow-md {{ request('program') || request('component_id') || request('section') || request('status') || request('grade') ? '' : 'hidden' }}">
        <form action="{{ route('dashboard.filterstudents') }}" method="GET" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">

            <select name="batch" id="batch-select" class="w-full p-2 border rounded">
                <option value="">Select A.Y.</option>
                @foreach($batches as $batch)
                <option value="{{ $batch->id }}" {{ (request('batch') == $batch->id) ? 'selected' : '' }}>
                    {{ $batch->batch }}
                </option>
                @endforeach
            </select>

            <select name="program" id="program-select" class="w-full p-2 border rounded">
                <option value="">Select Program</option>
                @foreach($programs as $program)
                    <option value="{{ $program->program_id }}" {{ request('program') == $program->program_id ? 'selected' : '' }}>
                        {{ $program->program_Code }}
                    </option>
                @endforeach
            </select>

            <select name="component_id" id="component-select" class="w-full p-2 border rounded">
                <option value="">Select Component</option>
                @foreach($components as $component)
                    <option value="{{ $component->component_id }}" {{ request('component_id') == $component->component_id ? 'selected' : '' }}>
                        {{ strtoupper($component->component_Name) }}
                    </option>
                @endforeach
            </select>

            <select name="section" id="section-select" class="w-full p-2 border rounded">
                <option value="">Select Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->sec_id }}" {{ request('section') == $section->sec_id ? 'selected' : '' }}>
                        {{ $section->sec_Section }}
                    </option>
                @endforeach
            </select>

            <select name="status" id="status-select" class="w-full p-2 border rounded">
                <option value="">Select Status</option>
                <option value="passed" {{ request('status') == 'passed' ? 'selected' : '' }}>Passed</option>
                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>

            <select name="grade" id="grade-select" class="w-full p-2 border rounded" {{ request('status') != 'passed' ? 'disabled' : '' }}>
                <option value="">Select Grade</option>
                @foreach([1, 1.5, 2, 2.5, 3, 3.5, 4] as $grade)
                    <option value="{{ $grade }}" {{ request('grade') == $grade ? 'selected' : '' }}>
                        {{ $grade }}
                    </option>
                @endforeach
            </select>

            <div class='col-span-2 md:col-span-3 lg:col-span-5'>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Apply Filter</button>
                @if(request('program') || request('component_id') || request('section') || request('status') || request('grade'))
                <a href="{{ route('dashboard.studentlist', ['batch' => request('batch')]) }}" class="ml-2 text-blue-500 hover:underline">Clear Filter</a>
                @endif
            </div>
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
