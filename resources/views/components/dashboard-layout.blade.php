<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  @vite('resources/js/Pages/dashboard-script.js')
</head>

<body class="bg-gray-200">
    <div class="hidden">
        <x-window-alert message="message"/>
    </div>

  <!-- Header -->
  <header class="bg-yellow-500 p-8 text-xl fixed top-0 left-0 right-0 z-20">
    <h1 class="text-white font-bold text-right">Welcome, User!</h1>
  </header>

  <!-- Main Layout -->
  <div class="flex pt-20"> <!-- Added padding-top to avoid overlap with the fixed header -->

    <!-- Sidebar -->
    <aside class="h-screen w-64 bg-gray-800 text-white fixed top-20 left-0 z-10">
      <div class="p-4">
        <button class="flex items-center w-full px-4 py-4 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-600 transition-colors duration-300">
          <span class="text-lg font-bold bg-yellow-500 text-gray-800 rounded-full p-3 mr-3">+</span>
          <span class="text-lg font-semibold">Import Forms</span>
        </button>
      </div>

      <nav class="px-3 py-3">
        <ul>
          <li class="mb-3">
            <a href="#" class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👤</span>
              <span>Student Profile</span>
            </a>
          </li>
          <li class="mb-3">
            <a href="#" class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👤</span>
              <span>Formator Profile</span>
            </a>
          </li>
          <li class="mb-5">
            <a href="#" class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👥</span>
              <span>Class Profile</span>
            </a>
          </li>
        </ul>
      </nav>

      <div class="px-5 py-2 mt-3">
        <ul class="mt-4">
          <li class="mb-3">
            <a href="#" class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">
              <!-- Empty list items -->
            </a>
          </li>
        </ul>
      </div>

      <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
    @csrf
    <button
        type="submit"
        class="p-4 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200">
        Logout
    </button>
</form>

    </aside>

    <!-- Main Content Section -->
    <main class="ml-64 p-10 w-full h-screen overflow-y-auto bg-white">
      <!-- Your main content goes here -->
      {{ $slot }}
    </main>
  </div>

</body>

</html>
