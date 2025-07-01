<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\AbsensiPkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = GetCurrentGuard();
        $absensis = $role != 'pembimbing'
            ? AbsensiPkl::with('siswa')->orderBy('id', 'desc')->paginate(5)
            : AbsensiPkl::withWhereHas('siswa', function ($query) {
                $query->where('pembimbing_id', Auth::user()->id);
            })
            ->orderBy('id', 'desc')
            ->paginate(5);

        $kelas = Kelas::all();
        $status = [
            'Hadir',
            'Sakit',
            'Izin',
            'Alpha',
            'Terlambat',
        ];

        return view($role . '.absensi.index', compact('absensis', 'kelas', 'status'));
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
                'siswa_id' => 'required',
                'tanggal' => 'required|date|before_or_equal:today',
                'jam_masuk' => ['required', 'date_format:H:i'],
                'jam_keluar' => ['required', 'date_format:H:i', 'after:jam_masuk'],
                'status' => 'required',
                'keterangan' => 'nullable',
            ]);

            if(strtotime($validated['jam_masuk']) > strtotime('09:00') && strtotime($validated['jam_masuk']) < strtotime('17:00')){
                $validated['status'] = 'terlambat';
            }else{
                $validated['status'] = 'hadir';
            }

            AbsensiPkl::create($validated);

            return redirect()->back()->with('success', 'Siswa berhasil diabsen');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Tambah')
            ->with('error', 'Gagal untuk menambahkan absensi')
            ->with('modal-add', 'absensi-modal');
        }
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
        try{
            $validated = $request->validate([
                'siswa_id' => 'required',
                'tanggal' => 'required|date|before_or_equal:today',
                'jam_masuk' => ['required', 'date_format:H:i'],
                'jam_keluar' => ['required', 'date_format:H:i', 'after:jam_masuk'],
                'status' => 'required',
                'keterangan' => 'nullable',
            ],[
                'jam_keluar' => 'absen keluar tidak boleh melewati absen masuk'
            ]);


            if(in_array($validated['status'], ['sakit', 'izin', 'alpha'])){
                $validated['jam_masuk'] = null;
                $validated['jam_keluar'] = null;
            }else{
                if(strtotime($validated['jam_masuk']) > strtotime('09:00') && strtotime($validated['jam_masuk']) < strtotime('17:00')){
                    $validated['status'] = 'terlambat';
                }else{
                    $validated['status'] = 'hadir';
                }
            }

            $absensi->update($validated);

            return redirect()->back()->with('success', 'Absen siswa berhasil diperbarui');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Edit')
            ->with('error', 'Gagal untuk mengupdate absensi')
            ->with('modal-edit', 'absensi-modal' . $absensi->id);
        }
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
