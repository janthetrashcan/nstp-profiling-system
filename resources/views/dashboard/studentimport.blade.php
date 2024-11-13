<x-dashboard-layout>
    <form action="{{ route('student.import') }}"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col gap-3">
    @csrf

    <input type="file" name="registrar-data">
    <input type="file" name="form-data">

    <button type="submit"
    class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 flex flex-row w-fit h-12 px-6 py-2 justify-start items-center rounded-xl gap-2">
    Import
    </button>

</x-dashboard-layout>
