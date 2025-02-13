<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warehouse Management System - @yield('Page Title')</title>

    <!--Icons Cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!--Flowbite Cdn CSS-->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    {{-- Scroll Animasi --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="flex justify-between items-center px-4 md:px-14 py-4 bg-[#7EA2CD] shadow-md fixed w-full top-0 z-40 rounded-b-3xl">
        <div class="flex items-center gap-2">
            <img src="/assets/img/logo_sempel2.png" alt="logo" width="30px">
            <div class="text-[#F2F2F2] font-bold">Twin Koi</div>
        </div>
        <div class="md:flex items-center gap-5">
            <a href="/#" class="font-semibold text-sm text-[#F2F2F2] border-b-2 {{ request()->is('/') ? '' : 'border-[#7EA2CD] hover:text-gray-200 ' }}">
                BERANDA</a>
            <a href="#"
                class="font-semibold text-sm text-[#F2F2F2] border-b-2 {{ request()->is('about', 'about/*') ? '' : 'border-[#7EA2CD] hover:text-gray-200 ' }}">TENTANG
                KAMI</a>
            <a href="/#"
                class="font-semibold text-sm text-[#F2F2F2] border-b-2 border-[#7EA2CD] hover:text-gray-200">
                KLIEN
                KAMI</a>
            <a href="#"
                class="px-6 py-1 rounded-full bg-[#F2F2F2] hover:bg-white transition hover:shadow-md font-semibold">LOGIN</a>

        </div>
    </header>
    <!-- Page Content -->


                @yield('content')


    <footer class="bg-[#7EA2CD] text-[#F2F2F2] rounded-t-3xl">
        <div class="md:flex gap-10 justify-center p-8">
            <div class="w-full md:w-[60%] flex justify-start md:justify-center">
                <div>
                    <img src="/assets/img/logo_sempel2.png" alt="logo" class="w-[80px]">
                    <h1 class="font-bold text-xl lg:text-3xl">Twin Koi</h1>
                    <h2 class="text-base lg:text-lg">Tagline Lorem ipsum dolor sit amet consectetur adipisicing elit!
                        </h1>
                        <h3 class="text-xs lg:text-sm">Jl. Raya Tasikmalaya, Kec. Malangbong, Kab. Garut, Jawa Barat, 44188</h1>
                </div>
            </div>
            <div class="w-full md:w-[20%] mt-5 md:mt-0 flex justify-start md:justify-center">
                <div>
                    <p class="font-bold text-xl lg:text-2xl">Informasi</p>
                    <p>Lorem 1</p>
                    <p>Lorem 2</p>
                    <p>Lorem 3</p>
                    <p>Lorem 4</p>
                    <p>Lorem 5</p>
                </div>
            </div>
            <div class="w-full md:w-[20%] mt-5 md:mt-0 flex justify-start md:justify-center">
                <div>
                    <p class="font-bold text-xl lg:text-2xl">Tentang Kami</p>
                    <p>Lorem 1</p>
                    <p>Lorem 2</p>
                    <p>Lorem 3</p>
                    <p>Lorem 4</p>
                </div>
            </div>
        </div>
        <div class="bg-blue-900 text-center text-xs p-2">
            Copyright © 2025 Koi Farm Management
            System | koi-sys
        </div>
    </footer>
</body>
