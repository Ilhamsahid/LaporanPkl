<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'nama' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
        if(Auth::guard('pembimbing')->attempt($credentials)){
            return redirect()->route('pembimbing.dashboard');
        }

        return back()->withErrors([
            'login_error' => 'Username Dan Password Tidak Sesuai'
        ]);
    }

    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }

        if(Auth::guard('pembimbing')->check()){
            Auth::guard('pembimbing')->logout();
        }

        return redirect()->route('login');
    }

    public function hapusSession(){
        session()->flush();
    }
}
