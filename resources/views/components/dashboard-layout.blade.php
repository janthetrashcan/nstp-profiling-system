<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  @vite('resources/js/Pages/dashboard-script.js')
  <style>
    /* Ensure the body scrolls outside and the layout remains fixed */
    html, body {
      height: 100%;
      margin: 0;
      overflow-y: auto; /* Move the scrollbar outside */
    }

    /* Sidebar and header remain fixed */
    header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 20;
      background-color: #f59e0b; /* Yellow */
    }

    .main-layout {
      display: flex;
      margin-top: 5rem; /* Adjusted for the header height */
      height: calc(100vh - 5rem); /* To fill the rest of the screen */
    }

    .sidebar {
      position: fixed;
      top: 5rem; /* Position below the header */
      left: 0;
      bottom: 0;
      width: 16rem;
      background-color: #2d3748;
      color: white;
      z-index: 10;
      overflow-y: auto;
    }

    .content {
      margin-left: 16rem;
      padding: 2.5rem;
      width: 100%;
      height: 100%;
      overflow-y: auto;
      background-color: white;
    }

  </style>
</head>

<body class="bg-gray-200">

    <div class="hidden">
        <x-window-alert message="message"/>
    </div>

  <!-- Header -->
  <header class="bg-yellow-500 p-8 text-xl">
    <h1 class="text-white font-bold text-right">Welcome, User!</h1>
  </header>

  <!-- Main Layout -->
  <div class="main-layout"> <!-- The layout adjusts here -->
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="p-4">
        <a href="{{ route('dashboard.importstudents') }}" class="flex items-center w-full px-4 py-4 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-600 transition-colors duration-300 mt-6">
          <span class="text-lg font-bold bg-yellow-500 text-gray-800 rounded-full p-3 mr-3">+</span>
          <span class="text-lg font-semibold">Import Forms</span>
        </a>
      </div>

      <nav class="px-3 py-3">
        <ul>
          <li class="mb-3">
            <a href="{{ route('dashboard.studentlist') }}" class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👤</span>
              <span>Student Profile</span>
            </a>
          </li>
          <li class="mb-3">
            <a href="{{ route('dashboard.formatorlist') }}" class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👤</span>
              <span>Formator Profile</span>
            </a>
          </li>
        </ul>
      </nav>

      <div class="px-5 py-2 mt-3">
        <ul class="mt-4">
          <li class="mb-3">
            
              <!-- Empty list items -->
            </a>
          </li>
        </ul>
      </div>

      <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
        @csrf
        <button type="submit" class="p-4 bg-red-500 text-white rounded-lg hover:bg-red-600 mt-72 transition-colors duration-200">
          Logout
        </button>
      </form>
    </aside>

    <!-- Main Content Section -->
    <main class="content">
      <!-- Your main content goes here -->
      {{ $slot }}
    </main>
  </div>

</body>

</html>
