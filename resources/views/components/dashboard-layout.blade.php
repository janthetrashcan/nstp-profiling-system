<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header id='main-header' class='w-full flex flex-row justify-between items-center h-auto px-4 py-5 bg-brand-primary'>
        <div id='header-lhs' class='flex flex-row items-center'>
            <x-carbon-menu class='text-brand-text-dark-bg h-8'/>
        </div>
        <div id='header-rhs' class='flex flex-row justify-end items-center gap-x-3'>
            <x-carbon-user class='text-brand-text-dark-bg h-8'/>
            <p class='text-brand-text-dark-bg text-xl'>Welcome, </p>
        </div>
    </header>

    <div>
        {{ $slot }}
    </div>
</body>
</html>
