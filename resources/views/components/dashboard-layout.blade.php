<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  @vite('resources/js/Pages/dashboard-script.js')
</head>

<body class="h-full bg-gray-200">

  <div class="hidden">
    <x-window-alert message="message" />
  </div>

  <!-- Header -->
<header class="fixed top-0 left-0 right-0 z-20 bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 p-4 shadow-md flex items-center justify-between">
  <div class="flex items-center">
    <img src="/admin-profile.png" alt="Profile" class="h-15 w-12 "> <!-- Add a Profile -->
    <h1 class="text-white font-bold text-xl drop-shadow-md">Welcome, User!</h1>
  </div>
  <div class="flex items-center gap-4">
    <img src="/left-logo.png" alt="Logo" class="h-15 w-12"> <!--LOGO-->
  </div>
</header>


  <!-- Main Layout -->
  <div class="flex mt-20 h-[calc(100vh-5rem)]">
    <!-- Sidebar -->
    <aside class="fixed top-20 left-0 bottom-0 w-64 bg-gray-800 text-white overflow-y-auto shadow-lg">
      <div class="p-4">
        <a href="{{ route('dashboard.importstudents') }}"
          class="flex items-center w-full px-4 py-4 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-600 transition duration-300 mt-6">
          <span class="text-lg font-bold bg-yellow-500 text-gray-800 rounded-full p-3 mr-3">+</span>
          <span class="text-lg font-semibold">Import Forms</span>
        </a>
      </div>

      <nav class="px-4 py-3">
        <ul>
          <li class="mb-3">
            <a href="{{ route('dashboard.studentlist') }}"
              class="flex items-center text-white hover:bg-gray-100 hover:text-black transition duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👤</span>
              <span>Student Profile</span>
            </a>
          </li>
          <li class="mb-3">
            <a href="{{ route('dashboard.formatorlist') }}"
              class="flex items-center text-white hover:bg-gray-100 hover:text-black transition duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👤</span>
              <span>Formator Profile</span>
            </a>
          </li>
        </ul>
      </nav>

      <form method="POST" action="{{ route('logout') }}" class="flex justify-center mt-52">
        @csrf
        <button type="submit"
          class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
          Logout
        </button>
      </form>
    </aside>

    <!-- Main Content Section -->
    <main class="ml-64 w-full p-6 bg-white overflow-y-auto">
      <!-- Your main content goes here -->
      {{ $slot }}
    </main>
  </div>

</body>

</html>
