<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-10">
        <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Monitoring Absensi</h1>
                <a href="{{ route('absensi.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded shadow">
                    Tambah Absensi
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-700 text-gray-800 dark:text-gray-200">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="py-3 px-6 border-b dark:border-gray-600 text-left">No</th>
                            <th class="py-3 px-6 border-b dark:border-gray-600 text-left">Judul Absensi</th>
                            <th class="py-3 px-6 border-b dark:border-gray-600 text-left">QR Code</th>
                            <th class="py-3 px-6 border-b dark:border-gray-600 text-left">Tanggal Dibuat</th>
                            <th class="py-3 px-6 border-b dark:border-gray-600 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensis as $absensi)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 dark:border-gray-200">{{ $loop->iteration }}</td>
                                <td class="py-3 px-6 border-b dark:border-gray-600">{{ $absensi->judul }}</td>
                                <td class="py-3 px-6 border-b dark:border-gray-600">
                                    <img src="{{ asset($absensi->photo) }}" alt="QR Code" class="w-20 h-20">
                                </td>
                                <td class="py-3 px-6 border-b dark:border-gray-600">
                                    {{ $absensi->created_at->format('d-m-Y H:i') }}
                                </td>
                                <td class="py-3 px-6 border-b dark:border-gray-600">
                                    <a href="{{ route('absensi.download', $absensi->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded shadow">
                                        Download QR Code
                                    </a>
                                                                <!-- Tombol Hapus -->
                                    <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus absensi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
