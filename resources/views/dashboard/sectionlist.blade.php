<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <button class='bg-slate-200 hover:bg-slate-300 transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-add class='h-8' />
                <h1 class='font-semibold'>Add</h1>
            </button>
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
            Section Name
        </p>

        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            Section Component
        </p>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Section Student Count
        </p>

        <p class='text-lg w-2/12 font-semibold overflow-x-hidden outline-r-2'>
            Section Barangay Assigned
        </p>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Officer ID
        </p>

        <p class='text-lg w-1/12 font-semibold overflow-x-hidden outline-r-2'>
            Formator ID
        </p>
    </div>

    <!-- Pagination (optional) -->
    <div id='page-buttons' class='flex flex-row justify-end gap-5'>
        <!-- Add pagination if needed -->
    </div>
</x-dashboard-layout>
