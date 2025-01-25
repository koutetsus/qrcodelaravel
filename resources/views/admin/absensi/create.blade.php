<x-app-layout>


    <!DOCTYPE html>
    <html lang="en" class="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buat Absensi</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-center text-white">Buat Absensi Baru</h1>
            <form action="{{ route('absensi.store') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Input Judul -->
                <div>
                    <label for="judul" class="block font-medium mb-1 text-white">Judul Absensi</label>
                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900"
                        placeholder="Masukkan judul absensi"
                        required
                    >
                </div>
                <!-- Tombol Submit -->
                <div class="mt-5 flex justify-center">
                    <button type="submit" class="bg-white-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-200">
                        Generate QR Code
                    </button>
                </div>
            </form>
        </div>
    </body>
    </html>

</x-app-layout>
