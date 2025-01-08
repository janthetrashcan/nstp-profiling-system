<div class="p-7 !z-50">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <h1 class="text-2xl font-semibold text-gray-700 mb-3 cursor-default">Edit User</h1>

        <div class="w-full h-[1px] bg-gray-200 mb-5"></div>

        <input name="id" class="hidden" type="number">

        <div class="flex flex-col gap-y-3 justify-center items-start mb-4">
            <label for="surname">Surname</label>
            <input name="surname" id="surname" type="text" class="shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200 block w-full">

            <label for="firstName">First Name</label>
            <input name="firstName" id="firstName" type="text" class="shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200 block w-full">

            <label for="middleName">Middle Name</label>
            <input name="middleName" id="middleName" type="text" class="shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200 block w-full">

            <label for="email">Email</label>
            <input name="email" id="email" type="text" class="shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200 block w-full">

            <label for="password">Password</label>
            <input name="password" type="password" class="shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200 block w-full">

            <div class='flex flex-row justify-left items-center w-full gap-x-3 mt-2'>
                <input name="is_admin" id="is_admin" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:bg-gray-600">
                <label for="is_admin" class="select-none">Administrator Privileges</label>
            </div>

            <div class="w-full h-[1px] bg-gray-200 my-2"></div>

            <label for="confirmPassword">Enter your password to create new user</label>
            <input name="confirmPassword" type="password" class="shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200 block w-full">
        </div>

        <div class="flex flex-row justify-end gap-x-1">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm transition-all duration-200 flex flex-row w-fit h-fit px-3 py-2 justify-start items-center rounded-lg gap-2">
                <x-carbon-add-large class="h-5" />
                <h1 class="font-semibold">Add</h1>
            </button>

            <a wire:click="$dispatch('closeModal')" class="bg-gray-200 hover:bg-gray-100 text-gray-500 text-sm transition-all duration-200 flex flex-row w-fit h-fit px-3 py-2 justify-start items-center rounded-lg gap-2 cursor-pointer">
                <h1 class="font-semibold">Cancel</h1>
            </a>
        </div>
    </form>
</div>
