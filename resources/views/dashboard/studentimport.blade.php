<x-dashboard-layout>
    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="registrar_file">
        <input type="file" name="google_forms_file">
        <button type="submit">Import</button>
    </form>
</x-dashboard-layout>
