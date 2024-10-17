<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

  <!-- Header -->
  <header class="bg-yellow-500 p-8 text-xl flex justify-end">
    <h1 class="text-white font-bold">Welcome, User!</h1>
  </header>

  <!-- Main Content -->
  <div class="flex">
    <!-- Sidebar -->
    <aside class="h-full w-64 bg-gray-800 text-white fixed top-13 left-0">
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
        <h2 class="text-sm text-gray-400 uppercase font-bold">Component List</h2>
        <ul class="mt-4">
          <li class="mb-3">
            <a href="#" class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">


            </a>
          </li>
          <li class="mb-3">
            <a href="#" class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">

            </a>
          </li>
        </ul>
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class='p-4'>Logout</button>
    </form>
    </aside>

    <!-- Main Section -->
    <main class="ml-64 p-10 w-full">
      {{ $slot }}
    </main>
  </div>

</body>
</html>
