<?php

namespace App\Http\Controllers;

use App\Models\TempatPkl;
use Illuminate\Http\Request;

class TempatPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tempatPkls = TempatPkl::orderBy('id', 'desc')->paginate(5);

        return view('pkl.tempat.index', compact('tempatPkls'));
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
        TempatPkl::create($request->all());

        return redirect()->back()->with('success', 'Data tempat pkl berhasil ditambah!');
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
        $pkl->update($request->all());

        return redirect()->back()->with('success', 'Data tempat pkl berhasil diperbarui');
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
