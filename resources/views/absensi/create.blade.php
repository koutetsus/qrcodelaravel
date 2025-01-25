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
    <title>Isi Absensi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Isi Absensi</h1>
        <form action="{{ route('absensiSiswa.store', $absensi->id)  }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-medium">Judul</label>
                <input type="text" value="{{ $absensi->judul }}" readonly class="w-full border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label class="block font-medium">Nama</label>
                <input type="text" name="nama" class="w-full border-gray-300 rounded" placeholder="Masukkan nama" required>
            </div>
            <div class="mb-4">
                <label class="block font-medium">Kelas</label>
                <input type="text" name="kelas" class="w-full border-gray-300 rounded" placeholder="Masukkan kelas" required>
            </div>
            <div class="mb-4">
                <label class="block font-medium">Status Kehadiran</label>
                <select name="status" class="w-full border-gray-300 rounded">
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
        </form>
    </div>
</body>
</html>

</x-app-layout>
