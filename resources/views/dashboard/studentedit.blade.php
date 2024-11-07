<x-dashboard-layout>
    <div class='flex flex-row pr-4 mb-3 justify-between'>
        <div id='functions-lhs' class='flex flex-row gap-x-3'>
            <a href='{{ route('dashboard.showstudent', $student->s_id) }}' class='bg-gray-100 flex flex-row w-fit h-12 px-4 py-2 justify-start items-center rounded-xl gap-2'>
                <x-carbon-arrow-left class='h-6' />
                <h1 class='font-semibold'>Return</h1>
            </a>
        </div>
    </div>
  <div class="flex flex-col gap-y--3 p-6 max-w-4xl mx-auto bg-white shadow-lg rounded-lg">
    <!-- Title -->
    <h1 class="text-3xl font-bold mb-6">Edit Student Information</h1>

    <!-- Student Update Form -->
    <form action="{{ route('student.update', $student->s_id) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Student Information -->
      <div class="grid grid-cols-2 gap-6">
        <!-- Student No -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Student No</label>
          <input type="text" name="s_StudentNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_StudentNo }}" required>
        </div>

        <!-- Family Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Family Name</label>
          <input type="text" name="s_Surname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_Surname }}" required>
        </div>

        <!-- First Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700">First Name</label>
          <input type="text" name="s_FirstName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_FirstName }}" required>
        </div>

        <!-- Middle Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Middle Name</label>
          <input type="text" name="s_MiddleName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_MiddleName }}">
        </div>

        <!-- Sex -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Sex</label>
          <select name="s_Sex" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            <option value="male" {{ $student->s_Sex == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $student->s_Sex == 'female' ? 'selected' : '' }}>Female</option>
          </select>
        </div>

        <!-- Birthdate -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Birthdate</label>
          <input type="date" name="s_Birthdate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_Birthdate }}" required>
        </div>

        <!-- Contact Number -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Contact No</label>
          <input type="text" name="s_ContactNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_ContactNo }}" required>
        </div>

        <!-- Email Address -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" name="s_EmailAddress" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_EmailAddress }}" required>
        </div>
      </div>

      <!-- Address Information -->
      <div class="grid grid-cols-2 gap-6">
        <!-- City Address -->
        <div>
          <h2 class="text-xl font-semibold mb-4">City Address</h2>

          <!-- House No -->
          <div>
            <label class="block text-sm font-medium text-gray-700">House No</label>
            <input type="text" name="s_c_HouseNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_HouseNo }}" required>
          </div>

          <!-- Street -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Street</label>
            <input type="text" name="s_c_Street" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_Street }}" required>
          </div>

          <!-- Barangay -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Barangay</label>
            <input type="text" name="s_c_Barangay" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_Barangay }}" required>
          </div>

          <!-- City -->
          <div>
            <label class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="s_c_City" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_City }}" required>
          </div>

          <!-- Province -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Province</label>
            <input type="text" name="s_c_Province" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_c_Province }}" required>
          </div>
        </div>

        <!-- Provincial Address -->
        <div>
          <h2 class="text-xl font-semibold mb-4">Provincial Address</h2>

          <!-- Provincial House No -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Provincial House No</label>
            <input type="text" name="s_p_HouseNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_HouseNo }}" required>
          </div>

          <!-- Provincial Street -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Provincial Street</label>
            <input type="text" name="s_p_Street" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_Street }}" required>
          </div>

          <!-- Provincial Barangay -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Provincial Barangay</label>
            <input type="text" name="s_p_Barangay" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_Barangay }}" required>
          </div>

          <!-- Provincial City -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Provincial City</label>
            <input type="text" name="s_p_City" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_City }}" required>
          </div>

          <!-- Provincial Province -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Provincial Province</label>
            <input type="text" name="s_p_Province" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_p_Province }}" required>
          </div>
        </div>
      </div>

      <!-- Emergency Contact Information -->
      <div class="grid grid-cols-2 gap-6">
        <!-- Contact Person Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Contact Person Name</label>
          <input type="text" name="s_ContactPersonName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_ContactPersonName }}" required>
        </div>

        <!-- Contact Person No -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Contact Person No</label>
          <input type="text" name="s_ContactPersonNo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $student->s_ContactPersonNo }}" required>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-end">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          Update Student Information
        </button>
      </div>
    </form>
  </div>
</x-dashboard-layout>
