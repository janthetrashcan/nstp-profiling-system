<form action="{{ route('formator.destroy', $formator->f_id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this formator?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-700 transition-colors">
        Delete
    </button>
</form>