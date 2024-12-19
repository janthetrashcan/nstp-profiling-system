<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  {{-- <link rel="stylesheet" href="/public/build/assets/app-CQMMHOql.css"> --}}
  @vite('resources/css/app.css')
</head>

<body class="h-full">
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
      class="flex flex-col justify-between align-middle fixed top-20 left-0 bottom-0 w-64 bg-gray-800 text-white pt-6 pb-6 z-10 overflow-y-auto transform transition-transform duration-300">

      <div class='w-fill'>
        <div class="p-4 pt-0">
            <a
            href="{{ route('dashboard.importstudents') }}"
            class="flex items-center w-full px-4 py-4 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-600 transition-colors duration-300">
            <span class="text-lg font-bold bg-gray-200 text-gray-800 rounded-full p-1 mr-3 aspect-square"><x-carbon-document-add class='h-6 m-1' /></span>
            <span class="text-lg font-semibold">Import Forms</span>
            </a>
        </div>
        <div class="p-4 pt-0">
            <a
            href="{{ route('dashboard.exportdatapage') }}"
            {{-- onclick="Livewire.dispatch('openModal', { component: 'export-students' })" --}}
            class="flex items-center w-full px-4 py-4 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-600 transition-colors duration-300">
            <span class="text-lg font-bold bg-gray-200 text-gray-800 rounded-full p-1 mr-3"><x-carbon-export class='h-6 m-1'/></span>
            <span class="text-lg font-semibold">Export Data</span>
            </a>
        </div>

        <div class='w-fill h-[1px] bg-white opacity-20 ml-4 mr-4 mt-2'>
        </div>

        <h1 class='px-4 mt-4 mb-2 text-2xl font-semibold cursor-default'>Profiles</h1>
        <nav class="px-4 py-3">
            <ul>
            <div class='flex flex-col gap-3 mb-3'>
                <li class="">
                    <a href="{{ route('dashboard.studentlist') }}"
                    class="flex items-center hover:bg-blue-200 hover:bg-opacity-40 hover:text-white transition-colors duration-300 rounded-lg p-2
                    {{ Request::is('dashboard/students*') ? 'text-black bg-gray-100' : '' }} ">
                    {{-- <span class="text-white text-xs mr-2">►</span> --}}
                    <span class="mr-3"><x-carbon-user class='h-6 my-1 font-outline-4 font-outline-black' /></span>
                    <span>Students</span>
                    </a>
                </li>

                @if (Request::is('dashboard/students*'))
                @foreach(App\Models\Batch::all() as $batch)
                <li class="">
                    <a href="{{ route('dashboard.filterstudents', ['batch' => $batch->id]) }}"
                    class="flex items-center hover:bg-blue-200 hover:bg-opacity-40 hover:text-white transition-colors duration-300 rounded-lg p-2
                    {{ Request::get('batch') == $batch->id ? 'underline bg-gray-700' : '' }} ">
                    {{-- <span class="text-white text-xs mr-2">►</span> --}}
                    <span class="mr-3"><x-carbon-chevron-right class='h-3 my-1 font-outline-4 font-outline-black' /></span>
                    <span>{{ $batch->batch }}</span>
                    </a>
                </li>
                @endforeach
                @endif
            </div>

            <li class="mb-3">
                <a href="{{ route('dashboard.formatorlist') }}"
                class="flex items-center hover:bg-blue-200 hover:bg-opacity-40 hover:text-white transition-colors duration-300 rounded-lg p-2
                {{ Request::is('dashboard/formators*') ? 'text-black bg-gray-100' : '' }} ">
                {{-- <span class="text-white text-xs mr-2">►</span> --}}
                <span class="mr-3"><x-carbon-user-speaker class='h-6 my-1 font-outline-4 font-outline-black' /></span>
                <span>Formators</span>
                </a>
            </li>
            </ul>
        </nav>
      </div>

      <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
        @csrf
        <button type="submit"
          class="w-4/5 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
          Log out
        </button>
      </form>
    </aside>

    <!-- Main Content Section -->
    <main id="content" class="ml-64 p-10 w-full h-full overflow-y-auto bg-white transition-[margin-left] duration-300">
      @livewire('wire-elements-modal')
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
