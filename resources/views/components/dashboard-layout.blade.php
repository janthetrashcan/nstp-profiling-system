<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NSTP Profiling System</title>
    <script src="{{ asset('js/app.js') }}"></script>
    @vite('resources/css/app.css')
</head>



<body class='min-h-screen'>
    <header id='main-header' class='fixed w-full flex flex-row justify-between items-center h-auto px-4 py-5 bg-brand-primary z-30 shadow-md'>
        <div id='header-lhs' class='flex flex-row items-center gap-x-5'>
            <x-carbon-menu class='text-brand-text-dark-bg h-8'/>
            <h1 class='text-xl font-semibold'>[ALPHA] NSTP PROFILING SYSTEM</h1>
        </div>
        <div id='header-rhs' class='flex flex-row justify-end items-center gap-x-3'>

        </div>
    </header>

    <main id='main-cont' class='w-full h-full flex flex-row flex-grow-1 fixed z-10'>

        <div id='side-panel' class='flex flex-col w-1/5 h-full pt-24 pb-12 px-6 mt-3 bg-slate-200 justify-between items-start z-20'>

            <div id='functions-panel' class='flex flex-col w-full gap-y-6 justify-start items-start'>
                <button class='bg-slate-100 flex flex-row flex-wrap w-fit h-fit px-6 py-4 justify-start items-center rounded-2xl gap-2'>
                    <x-carbon-add class='h-8 font-bold' />
                    <h1 class='font-semibold text-lg text-left'>Import Data</h1>
                </button>

                <div id='navigation-panel' class='w-full flex flex-col gap-y-2 justify-start items-start'>
                    <button class='w-full px-4 py-2 rounded-xl text-left hover:bg-slate-100 transition-colors duration-200 linear active'>
                        Student List
                    </button>

                    <button class='w-full px-4 py-2 rounded-xl text-left hover:bg-slate-100 transition-colors duration-200 linear'>
                        Formator List
                    </button>

                    <button class='w-full px-4 py-2 rounded-xl text-left hover:bg-slate-100 transition-colors duration-200 linear'>
                        Section List
                    </button>
                </div>
            </div>
            <div id='profile-section' class='justify-self-end'>
                <div id='header-rhs' class='flex flex-row justify-end items-center gap-x-3'>
                    <x-carbon-user class='text-brand-text-dark-bg h-8'/>
                    <p class='text-brand-text-dark-bg text-lg'>User</p>
                </div>
            </div>


        </div>

        <div id='main-panel' class='w-4/5 h-full py-24 px-6 bg-slate-100 overflow-x-scroll overflow-y-scroll'>
            {{ $slot }}
        </div>
    </main>
</body>
</html>
