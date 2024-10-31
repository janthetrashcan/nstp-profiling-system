<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href="{{ route('dashboard.addformator') }}" class='bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-add class='h-8' />
                <h2 class='font-semibold'>Add Formator</h2>
            </a>
            <button class='bg-slate-200 hover:bg-slate-300 transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-trash-can class='h-6' />
                <h1 class='font-semibold'>Delete</h1>
            </button>
            <button class='bg-slate-200 hover:bg-slate-300 transition-colors duration-200 flex flex-row w-fit h-12 px-2 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-filter class='h-6' />
                <h1 class='font-semibold'>Filter</h1>
            </button>
        </div>

        <div id='functions-rhs' class='flex flex-row gap-x-3'>
            <input type='text' placeholder='Search' maxlength='30' class='bg-white hover:bg-slate-300 transition-colors duration-200 flex flex-row w-60 h-12 px-4 py-2 justify-start items-center rounded-xl gap-2' />
        </div>
    </div>

    <!-- Table Header -->
    <div class='cursor-default flex flex-row justify-between w-full h-auto p-4 rounded-lg'>
        <span class='w-4'></span>

        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            Family Name
        </p>

        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            First Name
        </p>

        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            Middle Name
        </p>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Age
        </p>

        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            Teaching Year Start
        </p>

        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            NSTP Teaching Year Start
        </p>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Units Count
        </p>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Component
        </p>
    </div>

    @foreach($formators as $formator)
    <div class='cursor-default flex flex-row justify-between items-center overflow-x-hidden h-auto px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors duration-200 linear'>

        <!-- Delete Checkbox -->
        <div class="flex items-center w-12">
            <input type='checkbox' name='student_ids[]' value='{{ $formator->f_id }}' form="deleteForm" class='w-4 h-4'>
        </div>


        <a href="{{ route('dashboard.showformator', $formator->f_id) }}" class="flex flex-row justify-between items-center w-full gap-4">


        <div class='cursor-default flex flex-row justify-between w-full h-auto p-4 rounded-lg'>
            <span class='w-4'></span>

            <p class='text-lg w-2/12 font-normal overflow-x-hidden outline-r-2'>
                {{ Str::upper($formator->f_Surname) }}
            </p>

            <p class='text-lg w-2/12 font-normal overflow-x-hidden outline-r-2'>
                {{ Str::upper($formator->f_FirstName) }}
            </p>

            <p class='text-lg w-2/12 font-normal overflow-x-hidden outline-r-2'>
                {{ Str::upper($formator->f_MiddleName) }}
            </p>

            <p class='text-lg w-1/12 font-normal overflow-x-hidden outline-r-2'>
                {{ $formator->f_Age }}
            </p>

            <p class='text-lg w-2/12 font-normal overflow-x-hidden outline-r-2'>
                {{ $formator->f_TeachingYearStart }}
            </p>

            <p class='text-lg w-2/12 font-normal overflow-x-hidden outline-r-2'>
                {{ $formator->f_NSTPTeachingYearStart }}
            </p>

            <p class='text-lg w-1/12 font-normal overflow-x-hidden outline-r-2'>
                {{ $formator->f_TeachingUnitCount }}
            </p>

            <p class='text-lg w-1/12 font-normal overflow-x-hidden outline-r-2'>
                {{ Str::upper($formator->f_Component) }}
            </p>
        </div>
    </div>
    @endforeach

    <!-- Pagination (optional) -->
    <div id='page-buttons' class='flex flex-row justify-end gap-5'>
        <!-- Add pagination if needed -->
    </div>
</x-dashboard-layout>
