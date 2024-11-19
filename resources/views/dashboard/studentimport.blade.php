<x-dashboard-layout>
    <div class='flex flex-col gap-2 w-max'>
        <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class='flex flex-col w-max gap-y-4'>
                <div id='registrar-file-area' class='flex flex-row gap-x-3
                            input-container w-72 h-72 items-center justify-center
                           outline-dashed outline-2 outline-gray-600
                           rounded-md'>

                    <div class='flex flex-col gap-y-3 justify-center items-center'>
                        <label for="registrar_file">Drag and drop <b>Registrar</b> Excel file.</label>
                        <input
                            type='file'
                            id='registrar_file'
                            name='registrar_file'
                            accept='.xlsx,.xlx'
                            class='' />

                        <div class='preview'>
                            <p>No files currently selected for upload.</p>
                        </div>
                    </div>
                </div>

                <div id='google-forms-file-area' class='flex flex-row gap-x-3
                            input-container w-72 h-72 items-center justify-center
                           outline-dashed outline-2 outline-gray-600
                           rounded-md'>

                    <div class='flex flex-col gap-y-3 justify-center items-center'>
                        <label for="google_forms_file">Drag and drop <b>Registrar</b> Excel file.</label>
                        <input
                            type='file'
                            id='google_forms_file'
                            name='google_forms_file'
                            accept='.xlsx,.xlx'
                            class='' />

                        <div class='preview'>
                            <p>No files currently selected for upload.</p>
                        </div>
                    </div>
                </div>



                    {{-- <input type="file" id='registrar_file' name="registrar_file" accept=".xlsx,.xlx"
                           class='input-container w-60 h-60
                           outline-dashed outline-2 outline-gray-600
                           rounded-md

                           file:py-1 file:px-3 file:border-[1px]


                           file:bg-gray-50 file:text-gray-700
                           hover:file:cursor-pointer hover:file:bg-blue-50
                           hover:file:text-blue-700
                           '>

                    <input type="file" id='google_forms_file' name="google_forms_file" accept=".xlsx,.xlx"
                           class='input-container w-60 h-60
                           outline-dashed outline-2 outline-gray-600
                           rounded-md'> --}}


                <button type="submit" class='px-4 py-2 bg-gray-200 rounded-lg'>Import</button>
            </div>


        </form>
    </div>
</x-dashboard-layout>
