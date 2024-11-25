<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  @vite('resources/js/Pages/dashboard-script.js')
  <style>
    html, body {
      height: 100%;
      margin: 0;
      overflow-y: auto;
      background-color: #f59e0b;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 20;
      background-color: #f59e0b; 
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.5rem 1rem;
    }

    .menu-toggle {
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1.5rem;
      color: white;
    }

    .main-layout {
      display: flex;
      margin-top: 5rem; 
      height: calc(100vh - 5rem); 
      transition: margin-left 0.3s;
      background-color: white; 
    }

    .sidebar {
      position: fixed;
      top: 5rem;
      left: 0;
      bottom: 0;
      width: 16rem;
      background-color: #2d3748;
      color: white;
      z-index: 10;
      overflow-y: auto;
      transition: transform 0.3s ease-in-out;
      transform: translateX(0);
    }

    .sidebar.collapsed {
      transform: translateX(-100%);
    }

    .content {
      margin-left: 16rem;
      padding: 2.5rem;
      width: 100%;
      height: 100%;
      overflow-y: auto;
      background-color: white;
      transition: margin-left 0.3s ease-in-out;
    }

    .content.full-width {
      margin-left: 0;
    }
  </style>
</head>

<body>

  <div class="hidden">
    <x-window-alert message="message"/>
  </div>

  <!-- Header -->
  <header style="height: 1rem; padding: 2rem 1.5rem; position: fixed; align-items: center; justify-content: space-between; display: flex; background-color: #f59e0b;">
  <button class="menu-toggle" id="menuToggle" style="font-size: 2rem; " >☰</button>
  <h1 class="text-white font-bold" style="font-size: 1.5rem; margin: 0;">Welcome, User!</h1>
</header>



  <!-- Main Layout -->
  <div class="main-layout">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
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
      <form method="POST" action="{{ route('logout') }}" class="flex justify-center mt-72">
        @csrf
        <button type="submit" class="p-4 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200">
          Logout
        </button>
      </form>
    </aside>

    <!-- Main Content Section -->
    <main class="content" id="content">

      {{ $slot }}
    </main>
  </div>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      content.classList.toggle('full-width');
    });
  </script>

</body>

</html>
