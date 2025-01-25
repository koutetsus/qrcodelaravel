<?php

namespace App\Http\Controllers;

use App\Models\Absensi;

use Illuminate\Http\Request;
use SimpleQrcode;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $absensis = Absensi::with('absensiSiswa')->get();
        return view('admin.absensi.dashboard', compact('absensis'));
    }

    public function create()
    {
        return view('admin.absensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        // Simpan absensi ke database
        $absensi = Absensi::create([
            'judul' => $request->judul,
        ]);

        // Generate URL untuk QR Code
        $qrUrl = route('absensi.scan', ['id' => $absensi->id]);

        // Membuat QR Code
        $qrCode = new QrCode($qrUrl);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        // $qrImage = base64_encode($result->getString());
         // Menyimpan QR Code ke folder storage
            $fileName = 'qrcode_' . $absensi->id . '.png';
            $filePath = storage_path('app/public/qrcodes/' . $fileName);

            // Pastikan folder qrcodes ada
    if (!file_exists(storage_path('app/public/qrcodes'))) {
        mkdir(storage_path('app/public/qrcodes'), 0777, true); // Membuat folder jika belum ada
    }

    // Simpan gambar QR Code ke file
    file_put_contents($filePath, $result->getString());

    $absensi->update([
        'photo' => 'storage/qrcodes/' . $fileName,  // Simpan path relatif ke public storage
    ]);
        // Kirim data ke view, termasuk QR image dalam bentuk data URI
        return view('admin.absensi.qrcode', compact('absensi'));
    }

    public function scan($id)
    {
        $absensi = Absensi::findOrFail($id);
        // Pastikan absensi valid
        return view('absensi.create', compact('absensi'));
    }

    public function destroy($id)
{
    // Cari data Absensi berdasarkan ID
    $absensi = Absensi::findOrFail($id);

    // Hapus absensi beserta relasi absensiSiswa jika diperlukan
    $absensi->delete();

        return redirect()->route('admin.absensi.dashboard')->with('success', 'Absensi Sudah Dihapus.');
    }
}
