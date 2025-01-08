<div class="p-7 !z-50">
    <form action="{{ route('sections.update', $section) }}" method="POST">
        @csrf
        @method('PUT')

        <h1 class="text-2xl font-semibold text-gray-700 mb-3 cursor-default">Edit Section</h1>

        <div class="w-fill h-[1px] bg-gray-200 mb-5"></div>

        <input name="sec_id" class="hidden" type="number" value="{{ $section->sec_id }}">

        <div class="flex flex-col gap-y-3 justify-center items-start mb-4">
            <label for="sec_Section">Section</label>
            <input name="sec_Section" type="text" value="{{ $section->sec_Section }}" class="shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200 block w-full">

            <label for="sec_Capacity">Capacity</label>
            <input name="sec_Capacity" type="number" value="{{ $section->sec_Capacity }}" class="shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200 block w-full">
        </div>

        <div class="flex flex-row justify-end gap-x-1">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm transition-all duration-200 flex flex-row w-fit h-fit px-3 py-2 justify-start items-center rounded-lg gap-2">
                <x-carbon-save class="h-5" />
                <h1 class="font-semibold">Save</h1>
            </button>

            <a wire:click="$dispatch('closeModal')" class="bg-gray-200 hover:bg-gray-100 text-gray-500 text-sm transition-all duration-200 flex flex-row w-fit h-fit px-3 py-2 justify-start items-center rounded-lg gap-2 cursor-pointer">
                <h1 class="font-semibold">Cancel</h1>
            </a>
        </div>
    </form>
</div>
