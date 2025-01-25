<x-app-layout>
    <div class="p-6 bg-gray-100 dark:bg-gray-900 rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Daftar Siswa per Absensi</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg shadow-md">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left text-gray-800 dark:text-gray-200 border-b dark:border-gray-600">No</th>
                        <th class="py-3 px-6 text-left text-gray-800 dark:text-gray-200 border-b dark:border-gray-600">Judul Absensi</th>
                        <th class="py-3 px-6 text-left text-gray-800 dark:text-gray-200 border-b dark:border-gray-600">Nama Siswa</th>
                        <th class="py-3 px-6 text-left text-gray-800 dark:text-gray-200 border-b dark:border-gray-600">Kelas</th>
                        <th class="py-3 px-6 text-left text-gray-800 dark:text-gray-200 border-b dark:border-gray-600">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;  // Nomor urut siswa
                    @endphp
                    @foreach ($absensis as $absensi)
                        <!-- Baris Judul Absensi -->
                        <tr>
                            <td colspan="5" class="py-3 px-6 font-semibold text-lg text-gray-900 dark:text-gray-200">
                                {{ $absensi->judul }}
                            </td>
                        </tr>

                        <!-- Data Siswa untuk setiap Absensi -->
                        @foreach ($absensi->absensiSiswa as $siswa)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 dark:border-gray-200">{{ $no++ }}</td> <!-- Nomor urut -->
                                <td class="py-3 px-6 text-gray-800 dark:text-gray-200">{{ $absensi->judul }}</td>
                                <td class="py-3 px-6 text-gray-800 dark:text-gray-200">{{ $siswa->nama }}</td>
                                <td class="py-3 px-6 text-gray-800 dark:text-gray-200">{{ $siswa->kelas }}</td>
                                <td class="py-3 px-6 text-gray-800 dark:text-gray-200">{{ $siswa->status }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
