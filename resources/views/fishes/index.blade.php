<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fishes') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Fish List</h3>
                <button onclick="window.location='{{ route('fishes.create') }}'" type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm0 6a1 1 0 0 0 -1 1v2h-2l-.117 .007a1 1 0 0 0 .117 1.993h2v2l.007 .117a1 1 0 0 0 1.993 -.117v-2h2l.117 -.007a1 1 0 0 0 -.117 -1.993h-2v-2l-.007 -.117a1 1 0 0 0 -.993 -.883z" fill="currentColor" stroke-width="0" />
                    </svg>
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border text-center border-gray-300 dark:border-gray-700">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="border px-4 py-2">Code</th>
                            <th class="border px-4 py-2">Variety</th>
                            <th class="border px-4 py-2">Breeder</th>
                            <th class="border px-4 py-2">Price</th>
                            <th class="border px-4 py-2">Size</th>
                            <th class="border px-4 py-2">Weight</th>
                            <th class="border px-4 py-2">Awards</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fishes as $fish)
                        <tr>
                            <td class="border px-4 py-2">{{ $fish->fish_code }}</td>
                            <td class="border px-4 py-2">{{ $fish->fish_variety }}</td>
                            <td class="border px-4 py-2">{{ $fish->breeder->breeder_name }}</td>
                            <td class="border px-4 py-2">{{ $fish->fish_price }}</td>
                            <td class="border px-4 py-2">{{ $fish->latestSize->fish_size }} cm</td>
                            <td class="border px-4 py-2">{{ $fish->latestSize->fish_weight }} kg</td>
                            <td class="border px-4 py-2">{{ $fish->awards_count }}</td>
                            <div class="flex justify-center">
                                <td class="border py-2 ">
                                    <button @click="editFish({{ $fish->fish_id }})" type="button" class="text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium px-4 rounded-lg text-sm text-center me-2 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white py-2.5 dark:hover:bg-yellow-500 dark:focus:ring-yellow-800 justify-items-center">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                </button>
                                                <button @click="editFish({{ $fish->fish_id }})" type="button" class="text-blue-700 hover:text-white border border-blue-700 py-2.5 hover:bg-blue-800 px-4 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 justify-items-center">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-ruler-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3l4 4l-14 14l-4 -4z" /><path d="M16 7l-1.5 -1.5" /><path d="M13 10l-1.5 -1.5" /><path d="M10 13l-1.5 -1.5" /><path d="M7 16l-1.5 -1.5" /></svg>
                                </button>
                                <button @click="editFish({{ $fish->fish_id }})" type="button" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm py-2.5 text-center px-4 me-2  dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-800 justify-items-center">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-award"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-6 0a6 6 0 1 0 12 0a6 6 0 1 0 -12 0" /><path d="M12 15l3.4 5.89l1.598 -3.233l3.598 .232l-3.4 -5.889" /><path d="M6.802 12l-3.4 5.89l3.598 -.233l1.598 3.232l3.4 -5.889" /></svg>
                                </button>
                                    {{-- <button class="bg-yellow-500 text-white px-3 py-1 rounded" @click="editFish({{ $fish->fish_id }})">Edit</button> --}}
                                    {{-- <form action="{{ route('fishes.destroy', $fish->fish_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                                    </form> --}}
                                </td>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script>
        function editFish(id) {
            fetch(`/fishes/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    Alpine.store('fish', data);
                    open = true;
                });
        }
    </script>
</x-app-layout>
