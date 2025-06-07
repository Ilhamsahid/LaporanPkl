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

        if(!Auth::guard('admin')->attempt($credentials)){
            return back()->withErrors([
                'login_error' => 'Username Dan Password Tidak Sesuai'
            ]);
        }

        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }

        return redirect()->route('login');
    }
}
