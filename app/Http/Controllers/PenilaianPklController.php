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

        $arr = 0;
        $kelasDipilih = $request->kelas_id;

        $siswas = $kelasDipilih
            ? Siswa::where('kelas_id', $kelasDipilih)->get()
            : Siswa::all(); // default (semua siswa)

        $penilaian = $role != 'pembimbing'
            ? Siswa::with('penilaian')
                ->whereHas('penilaian')
                ->orderByDesc(
                    PenilaianPkl::select(columns: 'id')
                        ->whereColumn('siswa_id', 'siswa.id')
                        ->orderByDesc('id')
                        ->limit(1)
                )->paginate(5)
            : Siswa::with('penilaian')
            ->leftJoin('penilaian_pkl', 'siswa.id', '=', 'penilaian_pkl.siswa_id')
            ->select('siswa.*') // ambil kolom siswa saja
            ->where('pembimbing_id', Auth::user()->id)
            ->selectRaw('MAX(penilaian_pkl.id) as latest_penilaian_id')
            ->groupBy('siswa.id')
            ->orderByRaw('ISNULL(latest_penilaian_id) DESC')  // siswa yg belum dinilai dulu
            ->orderByDesc('latest_penilaian_id')             // baru urut dari yg terbaru
            ->paginate(5);

        $penilaianSiswa = PenilaianPkl::with('siswa')
        ->where('siswa_id', Auth::user()->id)
        ->first();

        return view($role . '.penilaian.index', compact('kelas', 'siswas', 'penilaian', 'penilaianSiswa'));
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
            ->with('error', 'gagal untuk menginput nilai')
            ->with('modal-add', getCurrentGuard() != 'pembimbing'
                ? 'penilaian-modal'
                : 'penilaian-modal' . $request->id
            ); // 👈 penanda moda
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
        $penilaian = PenilaianPkl::where('siswa_id', $request->id)->first();

        if(!$penilaian){
            $this->store($request);

            return redirect()->back();
        }

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
                ->with('error', 'gagal untuk mengupdate nilai')
                ->with('modal-edit', 'penilaian-modal' . $id); // 👈 penanda modal
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
