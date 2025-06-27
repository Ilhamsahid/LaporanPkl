<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\PenilaianPkl;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = getCurrentGuard();

        $kelas = Kelas::all();

        $kelasDipilih = $request->kelas_id;

        $siswas = $kelasDipilih
            ? Siswa::where('kelas_id', $kelasDipilih)->get()
            : Siswa::all(); // default (semua siswa)

        $penilaian = $role != 'pembimbing'
            ? Siswa::with('penilaian')
            ->whereHas('penilaian')
            ->orderByDesc(
            PenilaianPkl::select('id')
                    ->whereColumn('siswa_id', 'siswa.id')
                    ->orderByDesc('id')
                    ->limit(1)
            )->paginate(5)
            : Siswa::with('penilaian')
            ->where('pembimbing_id', Auth::user()->id)
            ->orderByDesc(
            PenilaianPkl::select('id')
                        ->whereColumn('siswa_id', 'siswa.id')
                        ->latest()
                        ->take(1)
            )
            ->paginate(5);

        return view($role . '.penilaian.index', compact('kelas', 'siswas', 'penilaian'));
    }

    public function getSiswaByKelas($kelas_id)
    {
        $siswas = Siswa::where('kelas_id', $kelas_id)->get();
        return response()->json($siswas);
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
                'nilai_etika' => 'required|integer|max:100',
                'nilai_kedisplinan' => 'required|integer|max:100',
                'nilai_keterampilan' => 'required|integer|max:100',
                'nilai_wawasan' => 'required|integer|max:100',
                'nilai_akhir' => 'nullable|integer|max:100',
            ]);

            $penilaian = PenilaianPkl::create($validated);

            $penilaian->update([
                'nilai_akhir' => $penilaian->rata_rata,
            ]);

            return redirect()->back()->with('success', 'Data penilaian berhasil ditambah!');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Tambah')
            ->with('modal-add', 'penilaian-modal'); // 👈 penanda modal
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PenilaianPkl $penilaianPkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenilaianPkl $penilaianPkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $penilaian = PenilaianPkl::find($id);

        if (!$penilaian) {
            $this->store($request);

            return redirect()->back();
        }
        else{
            try {
                $validated = $request->validate([
                    'nilai_etika' => 'required|integer|max:100',
                    'nilai_kedisplinan' => 'required|integer|max:100',
                    'nilai_keterampilan' => 'required|integer|max:100',
                    'nilai_wawasan' => 'required|integer|max:100',
                    'nilai_akhir' => 'nullable|integer|max:100'
                ]);

                $penilaian->update($validated);
                $penilaian->refresh();
                $penilaian->update([
                    'nilai_akhir' => $penilaian->rata_rata,
                ]);


                return redirect()->back()->with('success', 'Data penilaian berhasil diupdate!');
            } 
            catch (\Illuminate\Validation\ValidationException $e ) {
                return redirect()->back()
                    ->withErrors($e->validator)
                    ->with('mode', 'Edit')
                    ->with('modal-edit', 'penilaian-modal' . $penilaian->id); // 👈 penanda modal
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenilaianPkl $penilaian)
    {
        $penilaian->delete();
        return redirect()->back()->with('success', 'Data penilaian berhasil dihapus!');
    }
}
