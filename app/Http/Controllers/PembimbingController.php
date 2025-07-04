<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\LaporanPkl;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PembimbingController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'nama' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::guard('pembimbing')->attempt($credentials)){
            return back()->withErrors([
                'login_error' => 'Username Dan Password Tidak Sesuai'
            ]);
        }

        return redirect()->route('');
    }

    public function hapussession(){
        session()->flush();
    }

    public function index()
    {
        $pembimbings = Pembimbing::orderBy('id', 'desc')->paginate(5);

        return view('admin.pembimbing.index', compact('pembimbings'));
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
                'nama' => 'required',
                'password' => 'nullable',
                'email' => 'required|email',
                'alamat' => 'required',
                'telepon' => [
                    'required',
                    'string',
                    'regex:/^(?:\+62|62|08)[0-9]{7,12}$/',
                ],
                'nip' => [
                    'nullable',
                    'string',
                    'unique:pembimbing,nip',
                    'regex:/^[0-9]{18}$/',
                ],
            ],[
                'telepon' => 'no telepon tidak valid',
                'nip' => 'nip tidak valid, nip harus 18 angka',
            ]);

            $validated['password'] = Hash::make('password');

            Pembimbing::create($validated);

            return redirect()->back()->with('success', 'Data pembimbing berhasil ditambah!');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
                ->withErrors($e->validator)
                ->with('mode', 'Tambah')
                ->with('modal-tambah', 'pembimbing-modal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembimbing $pembimbing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembimbing $pembimbing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembimbing $pembimbing)
    {
        try{
            $validated = $request->validate([
                'nama' => 'required',
                'password' => 'nullable',
                'email' => 'required|email|unique:pembimbing,email,' . $pembimbing->id,
                'telepon' => [
                    'required',
                    'string',
                    'regex:/^(?:\+62|62|08)[0-9]{7,12}$/',
                ],
                'nip' => [
                    'required',
                    'string',
                    'unique:pembimbing,nip,' . $pembimbing->id,
                    'regex:/^[0-9]{18}$/',
                ],
                'alamat' => 'required',
            ],
            [
                'telepon' => 'no telepon tidak valid',
                'nip' => 'nip tidak valid, nip harus 18 angka',
            ]);

            $pembimbing->update($validated);

            return redirect()->back()->with('success', 'Data pembimbing berhasil diupdate!');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
                ->withErrors($e->validator)
                ->with('mode', 'Edit')
                ->with('modal-edit', 'pembimbing-modal' . $pembimbing->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembimbing $pembimbing)
    {
        $pembimbing->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus!');
    }

    public function profil(){
        $pembimbing = Pembimbing::with('siswa')->where('id', Auth::user()->id)->first();
        $laporan = LaporanPkl::withWhereHas('siswa', function ($q) {
            $q->where('pembimbing_id', Auth::user()->id);
        })->get();
        $siswa = Siswa::with('tempatPkl', 'pembimbing')->where('pembimbing_id', Auth::user()->id)->get();
        $tempatPkl = [];
        $tempatPklCount = 0;
        $laporanPending = 0;
        $laporanSelesai = 0;

        foreach($laporan as $l){
            if ($l['status'] == 'selesai'){
                $laporanSelesai++;
            }else{
                $laporanPending++;
            }
        }

        foreach($siswa as $s){
            if ($s['tempat_pkl_id']){
                if ($s['tempat_pkl_id'] != $tempatPkl){
                    $tempatPkl = $s['tempat_pkl_id'];
                    $tempatPklCount++;
                }
            }
        }

        return view('pembimbing.profil.index', compact('pembimbing', 'laporan', 'laporanPending', 'laporanSelesai', 'tempatPklCount'));
    }
}
