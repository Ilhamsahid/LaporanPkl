<?php

namespace App\Http\Controllers;

use App\Models\TempatPkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TempatPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = getCurrentGuard();
        $tempatPkls = $role != 'pembimbing'
            ? TempatPkl::with('siswa')->orderBy('id', 'desc')->paginate(5)
            : TempatPkl::withWhereHas('siswa', function ($q) {
                $q->where('pembimbing_id', Auth::user()->id);
            })
            ->orderBy('id', 'desc')->paginate(5);

        return view($role . '.pkl.tempat.index', compact('tempatPkls'));
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
                'nama_tempat' => 'required|string',
                'bidang' => 'required|string',
                'email' => 'required|email|unique:tempat_pkl,email',
                'telepon' => [
                    'required',
                    'string',
                    'regex:/^(?:\+62|62|08)[0-9]{7,12}$/',
                ],
                'alamat' => 'required',
            ]);

            TempatPkl::create($validated);

            return redirect()->back()->with('success', 'Data tempat pkl berhasil ditambah!');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Tambah')
            ->with('modal-add', 'tempatPkl-modal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TempatPkl $tempatPkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TempatPkl $tempatPkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TempatPkl $pkl)
    {
        try{
            $validated = $request->validate([
                'nama_tempat' => 'required|string',
                'bidang' => 'required|string',
                'email' => 'required|email|unique:tempat_pkl,email,' . $pkl->id,
                'telepon' => [
                    'required',
                    'string',
                    'regex:/^(?:\+62|62|08)[0-9]{7,12}$/',
                ],
                'alamat' => 'required',
            ]);

            $pkl->update($validated);

            return redirect()->back()->with('success', 'Data tempat pkl berhasil diperbarui');
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->back()
            ->withErrors($e->validator)
            ->with('mode', 'Edit')
            ->with('modal-edit', 'tempatPkl-modal' . $pkl->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TempatPkl $pkl)
    {
        $pkl->delete();

        return redirect()->back()->with('success', 'Data tempat pkl berhasil dihapus');
    }
}
