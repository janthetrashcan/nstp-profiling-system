<form action="{{ route('student.destroy') }}" method="POST" id="deleteForm">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2">
        <x-carbon-trash-can class='h-6' />
        <h1 class='font-semibold'>Delete</h1>
    </button>
</form>
