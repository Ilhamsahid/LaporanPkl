<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\LaporanPkl;
use Illuminate\Http\Request;

class LaporanPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporans = LaporanPkl::with('siswa')->orderBy('id', 'desc')->paginate(5);

        $siswas = Siswa::all();
        $jeniss = ['mingguan', 'akhiran'];

        return view('pkl.laporan.index', compact('laporans', 'siswas', 'jeniss'));
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
        LaporanPkl::create($request->all());

        return redirect()->back()->with('success', 'Laporan berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPkl $laporanPkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPkl $laporanPkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanPkl $laporan)
    {
        $laporan->update($request->all());

        return redirect()->back()->with('success', 'Laporan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPkl $laporan)
    {
        $laporan->delete();

        return redirect()->back()->with('success', 'Laporan berhasil di hapus');
    }
}
