<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Absensi</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            // Tailwind Dark Mode Configuration
            tailwind.config = {
                darkMode: 'class', // Menggunakan kelas 'dark' untuk mengaktifkan dark mode
            };
        </script>
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 p-4 transition duration-300">
        <!-- Container -->
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <!-- Dropdown Filter -->
            <div class="mb-6">
                <label for="filter" class="block text-gray-700 dark:text-gray-300 font-medium">Filter Judul Absensi</label>
                <select id="filter" class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded px-2 py-1 w-full">
                    <option value="">Pilih Judul Absensi</option>
                    @foreach ($absensis as $absensi)
                        <option value="{{ $absensi->judul }}">{{ $absensi->judul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Data Absensi -->
            <div id="absensi-list">
                @foreach ($absensis as $absensi)
                <div class="absensi-item mb-8" data-judul="{{ $absensi->judul }}">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">{{ $absensi->judul }}</h1>

                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-3">Daftar Siswa</h2>
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="px-4 py-2 border dark:border-gray-600">No</th>
                                <th class="px-4 py-2 border dark:border-gray-600">Nama</th>
                                <th class="px-4 py-2 border dark:border-gray-600">Kelas</th>
                                <th class="px-4 py-2 border dark:border-gray-600">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absensi->absensiSiswa as $siswa)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="px-4 py-2 border dark:border-gray-600">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border dark:border-gray-600">{{ $siswa->nama }}</td>
                                    <td class="px-4 py-2 border dark:border-gray-600">{{ $siswa->kelas }}</td>
                                    <td class="px-4 py-2 border dark:border-gray-600">{{ $siswa->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Script untuk Filter -->
        <script>
            document.getElementById('filter').addEventListener('change', function() {
                const filterValue = this.value;
                const absensiItems = document.querySelectorAll('.absensi-item');

                absensiItems.forEach(item => {
                    const title = item.getAttribute('data-judul');
                    if (!filterValue || title === filterValue) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        </script>
    </body>
    </html>
</x-app-layout>
