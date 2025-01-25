<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('QR Code Absensi') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow-md dark:bg-gray-800">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">QR Code Absensi</h1>

        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">Berikut adalah QR Code untuk absensi <span class="font-semibold">{{ $absensi->judul }}</span>. Anda dapat memindai QR Code ini atau menggunakan tautan di bawah untuk mengisi absensi.</p>

        <div class="mb-8 flex justify-center">
            <img src="{{ asset($absensi->photo) }}" alt="QR Code" class="w-48 h-48 rounded shadow-md">
        </div>

        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">Scan QR Code atau gunakan link berikut untuk mengakses form absensi:</p>
        <a href="{{ route('absensi.scan', ['id' => $absensi->id]) }}" class="text-blue-600 hover:underline mb-6 block">Link ke Form Input Absensi</a>

        <a href="{{ route('absensi.download', $absensi->id) }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-300 mb-6">Download QR Code</a>

        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="inline-block bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 transition duration-300">Kembali ke Dashboard</a>
        </div>
    </div>
</x-app-layout>
