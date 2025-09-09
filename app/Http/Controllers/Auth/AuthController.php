<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        return view('auth.login', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $cekuser = User::where('username', $credentials)->value('status');

        if ($cekuser) {
            if ($cekuser == 1) {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    Alert::success('Success', 'Login Berhasil !');
                    return redirect()->intended('/dashboard');
                } else {
                    Alert::error('Error', 'Login Gagal !');
                    return redirect('/login');
                }
            } else {
                Alert::error('Error', 'User Tidak Aktif, Silahkan Hubungi Admin !');
                return redirect('/login');
            }
        } else {
            Alert::error('Error', 'Login Gagal !');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Log out Berhasil !');
        return redirect('/');
    }
}
