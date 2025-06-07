<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pembimbing;
use App\Models\TempatPkl;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::with('kelas', 'pembimbing', 'tempatPkl')->orderBy('id', 'desc')->paginate(5);
        $kelas = Kelas::all();
        $pembimbing = Pembimbing::all();
        $tempat_pkl = TempatPkl::all();

        $arrKelas = [
            'XII RPL 1',
            'XII RPL 2'
        ];

        if($kelas->count() < 1){
            foreach($arrKelas as $kelas){
                $kelas = Kelas::create(['nama' => $kelas]);
            }
            $kelas = Kelas::all();
        }

        return view('admin.siswa.index', compact('kelas', 'pembimbing', 'tempat_pkl', 'siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['password'] = bcrypt($request['password']);

        Siswa::create($request->all());

        return redirect()->back()->with('success', 'Data siswa berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());

        return redirect()->back()->with('success', 'Data siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus!');
    }
}
