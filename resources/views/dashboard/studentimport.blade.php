<x-dashboard-layout>
    @if(session('error'))
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action='{{ route('students.import') }}' method='POST' enctype='multipart/form-data'>
        @csrf
        <div class="flex flex-col gap-6 items-center mt-12">
            <!-- Large Box without Folded Corner Design -->
            <div class="relative w-[800px] h-[500px] bg-gray-100 rounded-lg shadow-lg border border-gray-300">
                <!-- File Areas Wrapper -->
                <div class="absolute inset-0 p-8 flex flex-row justify-center gap-12">
                    <!-- Registrar File Area -->
                    <div
                        class="flex flex-col items-center justify-center w-80 h-80 gap-y-4
                            border-dashed border-2 border-gray-500 rounded-lg
                            bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer drag-and-drop"
                        >
                        <label
                            for="registrar_file"
                            class="text-gray-700 text-center font-medium select-none"
                        >
                            Drag and drop <b>Registrar</b> Excel file
                        </label>
                        <p class="text-sm text-gray-500">or click to upload</p>
                        <button
                            type="button"
                            onclick="document.getElementById('registrar_file').click()"
                            class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg
                                hover:bg-gray-600 transition duration-300"
                        >
                            Browse
                        </button>
                        <input
                            type="file"
                            id="registrar_file"
                            name="registrar_file"
                            accept=".xlsx,.xls"
                            class="hidden"
                        />
                        <div class="preview text-sm text-gray-500">
                            <p>No files currently selected for upload.</p>
                        </div>
                    </div>

                    <!-- Google Forms File Area -->
                    <div
                        class="flex flex-col items-center justify-center w-80 h-80 gap-y-4
                            border-dashed border-2 border-gray-500 rounded-lg
                            bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer drag-and-drop"
                    >
                        <label
                            for="google_forms_file"
                            class="text-gray-700 text-center font-medium select-none"
                        >
                            Drag and drop <b>Google Forms</b> Excel file
                        </label>
                        <p class="text-sm text-gray-500">or click to upload</p>
                        <button
                            type="button"
                            onclick="document.getElementById('google_forms_file').click()"
                            class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg
                                hover:bg-gray-600 transition duration-300"
                        >
                            Browse
                        </button>
                        <input
                            type="file"
                            id="google_forms_file"
                            name="google_forms_file"
                            accept=".xlsx,.xls"
                            class="hidden"
                        />
                        <div class="preview text-sm text-gray-500">
                            <p>No files currently selected for upload.</p>
                        </div>
                    </div>
                </div>

            <!-- Submit Button inside the Box -->
            <button
                type="submit"
                class="px-6 py-2 bg-blue-900 text-white font-semibold rounded-lg
                       hover:bg-blue-800 transition duration-300 absolute bottom-8 left-1/2 transform -translate-x-1/2"
            >
                Import
            </button>
        </div>
    </form>

    <script>

        document.querySelectorAll('.drag-and-drop').forEach(area => {
            const input = area.querySelector('input');
            const preview = area.querySelector('.preview p');

            area.addEventListener('dragover', (e) => {
                e.preventDefault();
                area.classList.add('bg-darkgray-50', 'border-darkgray-400');
            });

            area.addEventListener('dragleave', () => {
                area.classList.remove('bg-darkgray-50', 'border-darkgray-400');
            });

            area.addEventListener('drop', (e) => {
                e.preventDefault();
                area.classList.remove('bg-darkgray-50', 'border-darkgray-400');
                const files = e.dataTransfer.files;
                if (files.length) {
                    input.files = files;
                    preview.textContent = files[0].name;
                }
            });

            input.addEventListener('change', () => {
                if (input.files.length) {
                    preview.textContent = input.files[0].name;
                }
            });
        });
    </script>
</x-dashboard-layout>
