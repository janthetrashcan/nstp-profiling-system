<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href='{{ route('dashboard.showformator', $formator->f_id) }}' class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-arrow-left class='h-6' />
                <h1 class='font-semibold'>Return</h1>
            </a>
        </div>
    </div>

    <!-- Formator Update Form -->
    <form action="{{ route('formator.update', $formator->f_id) }}" method="POST" class='flex flex-col gap-y-3'>
        @csrf
        @method('PUT')

        <div id='formator-profile' class='flex flex-col gap-y-3'>
        <p><strong>Viewing</strong> {{ $formator->f_FormatorNo }}</p>


            <div id='formator-info' class='flex flex-col gap-y-2 p-6 w-96 rounded-xl bg-gray-100'>
                <h1 class='text-2xl font-bold mb-4'>Edit Formator Information</h1>

                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Formator No</p>
                    <input type='text' name='employee_id' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->employee_id }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Family Name</p>
                    <input type='text' name='f_Surname' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_Surname }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>First Name</p>
                    <input type='text' name='f_FirstName' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_FirstName }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Middle Name</p>
                    <input type='text' name='f_MiddleName' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_MiddleName }}' />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Sex</p>
                    <select name='f_Sex' class='font-normal w-2/3 bg-white rounded' required>
                        <option value='male' {{ $formator->f_Sex == 'male' ? 'selected' : '' }}>Male</option>
                        <option value='female' {{ $formator->f_Sex == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Birthdate</p>
                    <input type='date' name='f_Birthdate' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_Birthdate }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Contact No</p>
                    <input type='text' name='f_ContactNo' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_ContactNo }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Email Address</p>
                    <input type='email' name='f_EmailAddress' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_EmailAddress }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Teaching Year Start</p>
                    <input type='text' name='f_TeachingYearStart' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_TeachingYearStart }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>NSTP Teaching Year Start</p>
                    <input type='text' name='f_NSTPTeachingYearStart' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_NSTPTeachingYearStart }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Teaching Unit Count</p>
                    <input type='text' name='f_TeachingUnitCount' class='font-normal w-2/3 bg-white rounded' value='{{ $formator->f_TeachingUnitCount }}' required />
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Component</p>
                    <select name='f_Component' class='font-normal w-2/3 bg-white rounded' required>
                        <option value='cwts' {{ $formator->f_Component == 'CWTS' ? 'selected' : '' }}>CWTS</option>
                        <option value='rotc' {{ $formator->f_Component == 'ROTC' ? 'selected' : '' }}>ROTC</option>
                        <option value='lts' {{ $formator->f_Component == 'LTS' ? 'selected' : '' }}>LTS</option>
                    </select>
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Employment Status</p>
                    <select name='f_EmploymentStatus' class='font-normal w-2/3 bg-white rounded' required>
                        <option value='hired' {{ $formator->f_EmploymentStatus == 'hired' ? 'selected' : '' }}>Hired</option>
                        <option value='not hired' {{ $formator->f_EmploymentStatus == 'not hired' ? 'selected' : '' }}>Not Hired</option>
                    </select>
                </div>
                <div class='flex flex-row gap-3'>
                    <p class='font-semibold w-1/3'>Active Teaching</p>
                    <select name='f_ActiveTeaching' class='font-normal w-2/3 bg-white rounded' required>
                        <option value='active' {{ $formator->f_ActiveTeaching == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                        <option value='inactive' {{ $formator->f_ActiveTeaching == 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
                    </select>
                </div>

                <div class='flex flex-row justify-end'>
                    <button type="submit" class='bg-blue-500 text-white px-4 py-2 rounded-xl'>Save</button>
                </div>
            </div>
        </div>
    </form>
</x-dashboard-layout>
