<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // FORM LOGIN
    public function showLogin()
    {
        if (session()->has('admin_id')) {
            return redirect()->route('admin.event-links.index');
        }

        return view('admin.auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()
                ->withErrors([
                    'username' => 'Username atau password salah.',
                ])
                ->onlyInput('username');
        }

        // Buat session baru setelah login berhasil
        $request->session()->regenerate();

        $request->session()->put([
            'admin_id' => $admin->id,
            'admin_name' => $admin->name,
        ]);

        return redirect()
            ->route('admin.event-links.index')
            ->with('success', 'Login berhasil. Selamat datang!');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->session()->forget([
            'admin_id',
            'admin_name',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('success', 'Kamu berhasil logout.');
    }
}
