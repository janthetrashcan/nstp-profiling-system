<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  @vite('resources/js/Pages/dashboard-script.js')
</head>

<body class="h-full">

  <div class="hidden">
    <x-window-alert message="message" />
  </div>

  <!-- Header -->
  <header class="fixed top-0 left-0 right-0 z-20 h-20 bg-blue-900 flex items-center justify-between px-3 py-2 shadow-md">
    <div class="flex items-center gap-4">
      <button id="menuToggle" class="text-white text-2xl cursor-pointer">☰</button>
      <img src="/sacsi-outline.png" alt="Logo" class="h-15 w-12">
      <h1 class="text-white font-bold text-2x1 drop-shadow-md font-sans serif">NSTP Profiling System</h1>
</div>
    <div class="flex items-center gap-4">
      <h1 class="text-white font-bold text-xl drop-shadow-md">Welcome, Admin!</h1>
      <img src="/admin-profile.png" alt="Profile" class="h-15 w-12">
    </div>
  </header>

  <!-- Main Layout -->
  <div class="flex mt-20 h-[calc(100vh-5rem)]">
    <!-- Sidebar -->
    <aside id="sidebar"
      class="fixed top-20 left-0 bottom-0 w-64 bg-gray-800 text-white z-10 overflow-y-auto transform transition-transform duration-300">
      <div class="p-4">
        <a href="{{ route('dashboard.importstudents') }}"
          class="flex items-center w-full px-4 py-4 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-600 transition-colors duration-300 mt-6">
          <span class="text-lg font-bold bg-gray-200 text-gray-800 rounded-full p-3 mr-3">+</span>
          <span class="text-lg font-semibold">Import Forms</span>
        </a>
      </div>
      <nav class="px-3 py-3">
        <ul>
          <li class="mb-3">
            <a href="{{ route('dashboard.studentlist') }}"
              class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👤</span>
              <span>Student Profile</span>
            </a>
          </li>
          <li class="mb-3">
            <a href="{{ route('dashboard.formatorlist') }}"
              class="flex items-center text-white hover:bg-gray-100 hover:text-black transition-colors duration-300 rounded-lg p-2">
              <span class="text-white text-xs mr-2">►</span>
              <span class="mr-2 text-yellow-500">👤</span>
              <span>Formator Profile</span>
            </a>
          </li>
        </ul>
      </nav>
      <form method="POST" action="{{ route('logout') }}" style= "margin-top: 24rem;" class="flex justify-center mt-72">
        @csrf
        <button type="submit"
          class="w-4/5 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200 ">
          Logout
        </button>
      </form>
    </aside>

    <!-- Main Content Section -->
    <main id="content" class="ml-64 p-10 w-full h-full overflow-y-auto bg-white transition-[margin-left] duration-300">
      {{ $slot }}
    </main>
  </div>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    menuToggle.addEventListener('click', () => {
      // Toggle Sidebar
      sidebar.classList.toggle('-translate-x-full');

      // Adjust Main Content Margin
      content.classList.toggle('ml-64');
    });
  </script>

</body>

</html>
