<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\PenilaianPkl;
use Illuminate\Http\Request;

class PenilaianPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $penilaians = PenilaianPkl::with('siswa.kelas')->orderBy('id', 'desc')->paginate(5);

        $kelas = Kelas::all();

        $kelasDipilih = $request->kelas_id;

        $siswas = $kelasDipilih
            ? Siswa::where('kelas_id', $kelasDipilih)->get()
            : Siswa::all(); // default (semua siswa)

        $rataRata = $penilaians->mapWithKeys(function ($penilaian) {
            $total = $penilaian->nilai_etika +
                    $penilaian->nilai_kedisplinan +
                    $penilaian->nilai_keterampilan +
                    $penilaian->nilai_wawasan;
            $rata = $total / 4;
            return [$penilaian->id => $rata];
        });

        $color = $rataRata->map(fn($nilai) => $nilai < 85 ? 'warning' : 'success')->toArray();

        return view('admin.penilaian.index', compact('penilaians', 'kelas', 'siswas', 'rataRata', 'color'));
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
            ]);

            PenilaianPkl::create($validated);

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
    public function update(Request $request, PenilaianPkl $penilaian)
{
    try {
        $validated = $request->validate([
            'nilai_etika' => 'required|integer|max:100',
            'nilai_kedisplinan' => 'required|integer|max:100',
            'nilai_keterampilan' => 'required|integer|max:100',
            'nilai_wawasan' => 'required|integer|max:100',
        ]);

        $penilaian->update($validated);

        return redirect()->back()->with('success', 'Data penilaian berhasil diupdate!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Edit')
            ->with('modal', 'penilaian-modal' . $penilaian->id); // 👈 penanda modal
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
