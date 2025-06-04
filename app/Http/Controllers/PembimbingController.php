<?php

namespace App\Http\Controllers;

use App\Models\Pembimbing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('dashboard');
    }

    public function hapussession(){
        session()->flush();
    }

    public function index()
    {
        $pembimbings = Pembimbing::orderBy('id', 'desc')->paginate(5);

        return view('pembimbing.index', compact('pembimbings'));
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
        $request['password'] = bcrypt($request['password']);

        Pembimbing::create($request->all());

        return redirect()->back()->with('success', 'Data pembimbing berhasil ditambah!');
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
        $pembimbing->update($request->all());

        return redirect()->back()->with('success', 'Data pembimbing berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembimbing $pembimbing)
    {
        $pembimbing->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus!');
    }

}
