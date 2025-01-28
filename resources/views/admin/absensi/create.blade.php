<x-app-layout>

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buat Absensi</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Buat Absensi Baru</h1>
            <form action="{{ route('absensi.store') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Input Judul -->
                <div class="mb-4">
                    <label for="judul" class="block font-medium text-gray-800">Judul Absensi</label>
                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan judul absensi"
                        required
                    >
                </div>
                <!-- Tombol Submit -->
                <div class="mt-5 flex justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-200">
                        Generate QR Code
                    </button>
                </div>
            </form>
        </div>
    </body>
    </html>

</x-app-layout>
