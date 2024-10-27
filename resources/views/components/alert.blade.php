<div class="fixed bg-gray-800 bg-opacity-50 w-screen h-screen z-50 flex items-center justify-center">
    <div class='min-h-fit h-1/3 w-1/2 bg-gray-200 rounded-xl flex flex-col p-6 justify-between gap-3'>
        <h1 class='text-3xl font-bold h-fit'>Alert</h1>
        <p class='h-max grow text-lg'>{{ $message }}<p>
        <div class="flex flex-row gap-2 justify-end">
            <button class="bg-blue-300 py-2 px-5 rounded-md">Confirm</button>
            <button class="bg-gray-300 py-2 px-5 rounded-md">Cancel</button>
        </div>
    </div>
</div>
