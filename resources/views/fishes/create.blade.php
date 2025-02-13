<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Fish') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 text-white">
        <form action="{{ route('fishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 grid-rows-1 md:grid-rows-2 ">

                <!-- 1. Fish Details -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 row-span-2">
                    <h3 class="text-lg font-semibold mb-3">Fish Details</h3>
                    <label class="block text-sm font-medium">Fish Code</label>
                    <input type="text" name="fish_code" class="w-full p-2 border rounded mb-2 bg-slate-400" required>

                    <label class="block text-sm font-medium">Variety</label>
                    <input type="text" name="fish_variety" class="w-full p-2 border rounded mb-2 bg-slate-400" required>

                    <label class="block text-sm font-medium">Breeder</label>
                    <select name="breeder_id" class="bg-slate-400 w-full p-2 border rounded mb-2">
                        @foreach($breeders as $breeder)
                            <option value="{{ $breeder->breeder_id }}">{{ $breeder->breeder_name }}</option>
                        @endforeach
                    </select>

                    <label class="block text-sm font-medium">Price</label>
                    <input type="number" name="fish_price" class="w-full p-2 border bg-slate-400 rounded mb-2" required>

                    <label class="block text-sm font-medium">Birth Date</label>
                    <input type="date" name="fish_birth_date" class="w-full p-2 border bg-slate-400 rounded mb-2" required>

                    <label class="block text-sm font-medium">Import Date</label>
                    <input type="date" name="fish_import_date" class="w-full bg-slate-400 p-2 border rounded mb-2">

                    <label class="block text-sm font-medium">Image</label>
                    <input type="file" name="fish_image" class="w-full p-2 border rounded mb-2">
                </div>



                <!-- 3. Birth Certificate -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 row-span-1">
                    <h3 class="text-lg font-semibold mb-3">Birth Certificate</h3>
                    <label class="block text-sm font-medium">Certificate Number</label>
                    <input type="text" name="certificate_number" class="w-full p-2 border bg-slate-400 rounded mb-2" required>

                    <label class="block text-sm font-medium">Issued Date</label>
                    <input type="date" name="certificate_issued_date" class="w-full p-2 bg-slate-400 border rounded mb-2">

                    <label class="block text-sm font-medium">Certificate File</label>
                    <input type="file" name="certificate_file" class="w-full p-2 border rounded mb-2">
                </div>

                <!-- 4. Awards -->
                {{-- <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 row-span-2" x-data="{ awards: [] }">
                    <h3 class="text-lg font-semibold mb-3">Awards</h3>

                    <label class="block text-sm font-medium">Award Placement</label>
                    <select name="award_placements" class="bg-slate-400 w-full p-2 border rounded mb-2">
                        <option></option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                    </select> --}}
                    {{-- <button onclick="log()">Debug</button> --}}

                    {{-- <label class="block text-sm font-medium">Award Date</label>
                    <input type="date" name="award_dates" class="w-full p-2 bg-slate-400 border rounded mb-2">

                    <label class="block text-sm font-medium">Award Certificate</label>
                    <input type="file" name="award_files" class="w-full p-2 border rounded mb-2">
                </div> --}}

                 <!-- 2. Fish Size -->
                 <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 row-span-1">
                    <h3 class="text-lg font-semibold mb-3">Fish Size</h3>
                    <label class="block text-sm font-medium">Size (cm)</label>
                    <input type="number" name="fish_size" class="w-full p-2 border bg-slate-400 rounded mb-2" required>

                    <label class="block text-sm font-medium">Weight (kg)</label>
                    <input type="number" name="fish_weight" class="w-full p-2 border bg-slate-400 rounded mb-2" required>

                    <label class="block text-sm font-medium">Measured Date</label>
                    <input type="date" name="measured_date" class="w-full p-2 border bg-slate-400 rounded mb-2" required>
                </div>
            </div>



            <div class="mt-6 text-right">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Save Fish</button>
            </div>
        </form>
    </div>

</x-app-layout>
