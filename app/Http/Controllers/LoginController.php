<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        return view('auth.login');
    }

    // Proses login
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            Auth::login($user);

            if ($user->role === 'user') {
                return redirect('/');
            } elseif (in_array($user->role, ['admin', 'maskapai'])) {
                return redirect('/dashboard');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Logout
    public function destroy($id = null)
    {
        Auth::logout();
        return redirect()->route('/');
    }

    // Fungsi lain tidak digunakan, tapi wajib ada
    public function create() {}
    public function show(Request $request) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
}
