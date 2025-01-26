<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiSiswaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'status' => 'required|in:Hadir,Tidak Hadir',
        ]);

        // Simpan data absensi siswa
        AbsensiSiswa::create([
            'absensi_id' => $id,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        // Redirect atau response sukses
        return redirect()->back()->with('success', 'Absensi berhasil disimpan.');
    }
    public function dashboard()
    {
        // Ambil absensi beserta siswa yang terkait
        $absensis = Absensi::with('absensiSiswa')->get();

        // Kirimkan data ke view
        return view('admin.absensi.dashboard', compact('absensis'));
    }

    public function index(Request $request)
    {
        $filter = $request->get('filter');
        $absensis = Absensi::with('absensiSiswa')->get();  // Ambil semua data absensi

        if ($filter) {
            $absensis = $absensis->where('judul', 'like', '%' . $filter . '%');
        }


        return view('admin.absensi.absensisiswa', compact('absensis'));
    }

}
