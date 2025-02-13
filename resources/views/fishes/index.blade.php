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
                <button onclick="window.location='{{ route('fishes.create') }}'" class="bg-blue-600 text-white px-4 py-2 rounded-md">Add Fish</button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="border px-4 py-2">Code</th>
                            <th class="border px-4 py-2">Variety</th>
                            <th class="border px-4 py-2">Breeder</th>
                            <th class="border px-4 py-2">Price</th>
                            <th class="border px-4 py-2">Birth Date</th>
                            <th class="border px-4 py-2">Import Date</th>
                            <th class="border px-4 py-2">Certificates</th>
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
                            <td class="border px-4 py-2">{{ $fish->fish_birth_date }}</td>
                            <td class="border px-4 py-2">{{ $fish->fish_import_date }}</td>
                            <td class="border px-4 py-2">{{ $fish->user->name }}</td>
                            <td class="border px-4 py-2 flex space-x-2">
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded" @click="editFish({{ $fish->fish_id }})">Edit</button>
                                <form action="{{ route('fishes.destroy', $fish->fish_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </td>
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
