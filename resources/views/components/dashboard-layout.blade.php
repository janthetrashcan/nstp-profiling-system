<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class='min-h-screen'>
    <header id='main-header' class='fixed w-full flex flex-row justify-between items-center h-auto px-4 py-5 bg-brand-primary z-20 shadow-md'>
        <div id='header-lhs' class='flex flex-row items-center'>
            <x-carbon-menu class='text-brand-text-dark-bg h-8'/>
        </div>
        <div id='header-rhs' class='flex flex-row justify-end items-center gap-x-3'>
            <x-carbon-user class='text-brand-text-dark-bg h-8'/>
            <p class='text-brand-text-dark-bg text-xl'>Welcome, User</p>
        </div>
    </header>

    <main id='main-cont' class='w-full h-full flex flex-row flex-grow-1 fixed z-10'>
        <div id='side-panel' class='w-1/5 h-full py-24 px-6 bg-slate-100'>
            test
        </div>

        <div id='main-panel' class='w-4/5 h-full py-24 px-6 bg-slate-200 overflow-y-scroll'>
            {{ $slot }}
        </div>
    </main>
</body>
</html>
