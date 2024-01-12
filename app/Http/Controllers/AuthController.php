<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function viewlogin(Request $request)
    {
        if ($request->has('src')) {
            return view('login');
        } else {
            if (Auth::check()) {
                return redirect('dashboard');
            } else {
                return view('login');
            }
        }
    }

    public function proccesslogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard_view');
        } else {
            return redirect()->route('login')->with('login_message', 'Periksa kembali email dan password anda');
        }
    }

    public function proccesslogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
