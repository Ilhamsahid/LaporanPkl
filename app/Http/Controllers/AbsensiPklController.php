<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\AbsensiPkl;
use Illuminate\Http\Request;

class AbsensiPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensis = AbsensiPkl::with('siswa')->orderBy('id', 'desc')->paginate(5);

        $kelas = Kelas::all();
        $status = [
            'Hadir',
            'Sakit',
            'Izin',
            'Alpha',
        ];

        return view('absensi.index', compact('absensis', 'kelas', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AbsensiPkl::create($request->all());

        return redirect()->back()->with('success', 'Siswa berhasil diabsen');
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiPkl $absensiPkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiPkl $absensiPkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AbsensiPkl $absensi)
    {
        $absensi->update($request->all());

        return redirect()->back()->with('success', 'Absen siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiPkl $absensi)
    {
        $absensi->delete();

        return redirect()->back()->with('success', 'Absen siswa berhasil dihapus');
    }
}
