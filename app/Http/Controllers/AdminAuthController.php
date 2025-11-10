<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('home'); // diarahkan ke home
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // ========================
    // FITUR LUPA PASSWORD ADMIN
    // ========================
    public function showForgotForm()
    {
        return view('admin.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->withErrors(['email' => 'Email tidak terdaftar sebagai admin.']);
        }

        $token = bin2hex(random_bytes(16));
        session(['reset_token' => $token]);

        $resetLink = url('/admin/reset-password?token=' . $token);

        Mail::raw("Klik link berikut untuk mengatur ulang sandi Anda:\n\n$resetLink", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Reset Password Admin - Dapur Ibu');
        });

        return back()->with('status', 'Link reset password telah dikirim ke email admin.');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->query('token');

        if (!$token || $token !== session('reset_token')) {
            return redirect()->route('admin.password.request')->withErrors(['token' => 'Token reset tidak valid atau kadaluarsa.']);
        }

        return view('admin.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);

        if ($request->token !== session('reset_token')) {
            return back()->withErrors(['token' => 'Token tidak valid.']);
        }

        $admin = Admin::first(); // hanya satu admin
        $admin->password = Hash::make($request->password);
        $admin->save();

        session()->forget('reset_token');

        return redirect()->route('admin.login')->with('status', 'Password berhasil diubah, silakan login kembali.');
    }
}
