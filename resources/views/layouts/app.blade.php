<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon/favicon.ico') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col md:flex-row">
        @include('layouts.sidebar')
        <div class="w-full md:flex-1">
            @include('layouts.navigation')
            <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="mx-auto py-6 px-3 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    <div class="px-3 py-3">
                        @if (session()->has('success'))
                            <x-toast-success :message="session('success')"></x-toast-success>
                        @elseif(session()->has('error'))
                            <x-toast-error :message="session('error')"></x-toast-error>
                        @elseif(session()->has('warning'))
                            <x-toast-warning :message="session('warning')"></x-toast-warning>
                        @endif

                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

    </div>
</body>

</html>
