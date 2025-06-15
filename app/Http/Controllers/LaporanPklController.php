<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\LaporanPkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = getCurrentGuard();
        $laporans = $role != 'pembimbing'
            ? LaporanPkl::with('siswa')->orderBy('id', 'desc')->paginate(5)
            : LaporanPkl::withWhereHas('siswa', function ($query) {
                $query->where('pembimbing_id', Auth::user()->id);
            })->paginate(5);

        $siswas = Siswa::all();
        $jeniss = ['mingguan', 'akhir'];

        return view( $role . '.pkl.laporan.index', compact('laporans', 'siswas', 'jeniss'));
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
        try{
            $validated = $request->validate([
                'judul' => 'required',
                'isi_laporan' => 'required',
                'siswa_id' => 'required',
                'tanggal' => 'required|date|before_or_equal:today',
                'jenis_laporan' => 'required',
                'status' => 'required',
            ],[
                'tanggal' => 'Tanggal harus diisi sebelum hari ini'
            ]);

            LaporanPkl::create($validated);

            return redirect()->back()->with('success', 'Laporan berhasil di tambah');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Tambah')
            ->with('modal-add', 'laporan-modal');
        }
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
        try{
            $role = getCurrentGuard();
            if($role != 'pembimbing')
                $validated = $request->validate([
                    'judul' => 'required',
                    'isi_laporan' => 'required',
                    'siswa_id' => 'required',
                    'tanggal' => 'required|date|before_or_equal:today',
                    'jenis_laporan' => 'required'
                ],[
                    'tanggal' => 'Tanggal harus diisi sebelum hari ini'
                ]);

            $role != 'pembimbing'
                ? $laporan->update($validated)
                : $laporan->update(['status' => 'selesai']);

            return redirect()->back()->with('success', 'Laporan berhasil di update');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Edit')
            ->with('modal-edit', 'laporan-modal' . $laporan->id);
        }
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
