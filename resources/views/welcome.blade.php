@extends('layouts.landing')
@section('Page Title', 'Landing Page')
@section('content')
<style>
    .swiper-container {
        position: relative;
    }
    .swiper-pagination {
        position: absolute;
        bottom: 10px; /* Adjust as needed */
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }
    /* Custom scrollbar for filter buttons */
    .filter-scroll::-webkit-scrollbar {
        height: 4px; /* Slimmer scrollbar */
    }

    .filter-scroll::-webkit-scrollbar-track {
        background: #f1f1f1; /* Light grey track */
        border-radius: 3px;
    }

    .filter-scroll::-webkit-scrollbar-thumb {
        background: #888; /* Darker grey thumb */
        border-radius: 3px;
    }

    .filter-scroll::-webkit-scrollbar-thumb:hover {
        background: #555; /* Dark grey thumb on hover */
    }

    html, body {
        overflow-x: hidden;
    }
</style>
<div class="min-h-screen bg-gray-100">

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Carousel Section -->
        <div class="mt-16 mb-8">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="https://placehold.co/1200x400" alt="Koi Farm" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://placehold.co/1200x400" alt="Koi Farm" class="w-full h-64 object-cover rounded-lg">
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>

        </div>


        <!-- Filter Buttons (Horizontally Scrollable) -->
        <div class="mb-8 overflow-x-auto whitespace-nowrap filter-scroll">
            <div class="inline-flex space-x-4 mb-2">
                @foreach (['All', 'Kohaku', 'Sanke', 'Showa', 'Utsuri', 'Bekko', 'Asagi', 'Shusui', 'Kohaku', 'Sanke', 'Showa', 'Utsuri', 'Bekko', 'Asagi', 'Shusui'] as $filter)
                    <button wire:click="filterFishes('{{ $filter }}')" class="px-6 py-2 bg-white border border-gray-300 rounded-full text-sm font-medium hover:bg-gray-50">
                        {{ $filter }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Fish List (2 Rows, 4 Columns) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {{-- @foreach ($fishes as $fish) --}}
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Fish Image -->
                    <img src="" alt="" class="w-full h-48 object-cover">

                    <!-- Fish Details -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Variety</h3>
                        <p class="text-sm text-gray-600">Weight: 3 kg</p>
                        <p class="text-sm text-gray-600">Size: 21 cm</p>
                        <p class="text-sm text-gray-600">Price: Rp. 1000000 </p>
                    </div>

                    <!-- Awards Section -->
                    <div class="p-4 pt-2 flex space-x-2">
                        {{-- @foreach ($fish['awards'] as $award)
                            @if ($award === '1st')
                                <span class="text-yellow-500">🥇</span>
                            @elseif ($award === '2nd')
                                <span class="text-gray-500">🥈</span>
                            @elseif ($award === '3rd')
                                <span class="text-amber-800">🥉</span>
                            @endif
                        @endforeach --}}
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
</div>

<!-- Swiper JS and CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });

    // Re-initialize Swiper for Livewire
    document.addEventListener('livewire:load', function () {
        new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });

    document.addEventListener('livewire:update', function () {
        new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
</script>

@endsection
