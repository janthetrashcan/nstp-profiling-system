<div class="p-7 z-50">
    <h1 class="text-2xl font-semibold text-red-500 mb-3 cursor-default">Remove Program</h1>

    <div class="w-fill h-[1px] bg-gray-200 mb-5"></div>

    <div class="flex flex-col gap-3 mb-5">
        <h1 class="text-gray-700">Do you wish to remove {{ $user->surname." ".$user->firstName." ".$user->middleName }}?</h1>

        @if (Auth::user()->id == $user->id)
        <p class="text-gray-900">You are currently logged in using this account. Removing it will log you out.</p>
        @endif
    </div>

    <form action="{{ route('users.destroy', $user) }}" method="POST" class="flex flex-row gap-2 justify-end">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm transition-all duration-200 flex flex-row w-fit h-fit px-4 py-3 justify-start items-center rounded-lg gap-2">
            <x-carbon-trash-can class="h-5" />
            <h1 class="font-semibold">Remove</h1>
        </button>

        <a wire:click="$dispatch('closeModal')" class="bg-gray-200 hover:bg-gray-100 text-gray-500 text-sm transition-all duration-200 flex flex-row w-fit h-fit px-4 py-3 justify-start items-center rounded-lg gap-2 cursor-pointer">
            <h1 class="font-semibold">Cancel</h1>
        </a>
    </form>
</div>
