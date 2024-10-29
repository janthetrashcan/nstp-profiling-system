<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href='{{ route('dashboard.showstudent', $student->s_id) }}' class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-arrow-left class='h-6' />
                <h1 class='font-semibold'>Return</h1>
            </a>
        </div>
    </div>

    <!-- Student Update Form -->
    <form action="{{ route('student.update', $student->s_id) }}" method="POST" class='flex flex-col gap-y-3'>
        @csrf
        @method('PUT')

        <div id='student-profile' class='flex flex-col gap-y-3'>
            <p>Viewing {{ $student->s_StudentNo }}</p>

            <div id='student-info' class='flex flex-col gap-y-2 p-6 w-96 rounded-xl bg-gray-100'>
                <h1 class='text-2xl font-bold mb-4'>Edit Student Information</h1>

                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Student No</p>
                    <input type='text' name='s_StudentNo' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_StudentNo }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Family Name</p>
                    <input type='text' name='s_Surname' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_Surname }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>First Name</p>
                    <input type='text' name='s_FirstName' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_FirstName }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Middle Name</p>
                    <input type='text' name='s_MiddleName' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_MiddleName }}' />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Sex</p>
                    <select name='s_Sex' class='font-normal w-2/3 bg-white rounded' required>
                        <option value='male' {{ $student->s_Sex == 'male' ? 'selected' : '' }}>Male</option>
                        <option value='female' {{ $student->s_Sex == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Birthdate</p>
                    <input type='date' name='s_Birthdate' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_Birthdate }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Contact No</p>
                    <input type='text' name='s_ContactNo' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_ContactNo }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Email Address</p>
                    <input type='email' name='s_EmailAddress' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_EmailAddress }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>House No</p>
                    <input type='text' name='s_c_HouseNo' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_c_HouseNo }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Street</p>
                    <input type='text' name='s_c_Street' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_c_Street }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Barangay</p>
                    <input type='text' name='s_c_Barangay' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_c_Barangay }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>City</p>
                    <input type='text' name='s_c_City' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_c_City }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Province</p>
                    <input type='text' name='s_c_Province' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_c_Province }}' required />
                </div>
                <!-- Provincial Address -->
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Provincial House No</p>
                    <input type='text' name='s_p_HouseNo' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_p_HouseNo }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Provincial Street</p>
                    <input type='text' name='s_p_Street' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_p_Street }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Provincial Barangay</p>
                    <input type='text' name='s_p_Barangay' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_p_Barangay }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Provincial City</p>
                    <input type='text' name='s_p_City' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_p_City }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Provincial Province</p>
                    <input type='text' name='s_p_Province' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_p_Province }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Contact Person Name</p>
                    <input type='text' name='s_ContactPersonName' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_ContactPersonName }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Contact Person No</p>
                    <input type='text' name='s_ContactPersonNo' class='font-normal w-2/3 bg-white rounded' value='{{ $student->s_ContactPersonNo }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Program</p>
                    <select name='program_id' class='font-normal w-2/3 bg-white rounded' required>
                        @foreach($programs as $program)
                            <option value="{{ $program->program_id }}" {{ $student->program_id == $program->program_id ? 'selected' : '' }}>{{ $program->program_Code }}</option>
                        @endforeach
                    </select>
                </div>


                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Section</p>
                    <select name='sec_id' class='font-normal w-2/3 bg-white rounded' required>
                        @foreach($sections as $section)
                            <option value="{{ $section->sec_id }}" {{ $student->sec_id == $section->sec_id ? 'selected' : '' }}>{{ $section->sec_Section }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='flex flex-row justify-end'>
                    <button type="submit" class='bg-blue-500 text-white px-4 py-2 rounded-xl'>Save</button>
                </div>
            </div>
        </div>
    </form>
</x-dashboard-layout>
