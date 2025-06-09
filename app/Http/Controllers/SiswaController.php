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
        try{
            $validated = $request->validate([
                'nama' => 'required|string',
                'email' => 'required|email|unique:siswa,email',
                'password' => 'nullable',
                'alamat' => 'required',
                'telepon' => [
                    'required',
                    'string',
                    'regex:/^(?:\+62|62|08)[0-9]{7,12}$/',
                ],
                'pembimbing_id' => 'required',
                'tempat_pkl_id' => 'required',
                'kelas_id' => 'required',
            ],
            [
                'telepon' => 'No telepon tidak valid',
                'email' => 'Email sudah dipakai',
            ]);

            $validated['password'] = bcrypt($validated['password']);

            Siswa::create($validated);

            return redirect()->back()->with('success', 'Data siswa berhasil ditambah!');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Tambah')
            ->with('modal-add', 'siswa-modal');
        }
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
        try{
            $validated = $request->validate([
                'nama' => 'required|string',
                'email' => 'required|email|unique:siswa,email,' . $siswa->id,
                'password' => 'nullable',
                'alamat' => 'required',
                'telepon' => [
                    'required',
                    'string',
                    'regex:/^(?:\+62|62|08)[0-9]{7,12}$/',
                ],
                'pembimbing_id' => 'required',
                'tempat_pkl_id' => 'required',
                'kelas_id' => 'required',
            ],
            [
                'telepon' => 'no telepon tidak valid',
                'email' => 'Email sudah dipakai',
            ]);

            $siswa->update($validated);

            return redirect()->back()->with('success', 'Data siswa berhasil diupdate!');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Edit')
            ->with('modal-edit', 'siswa-modal' . $siswa->id);
        }
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