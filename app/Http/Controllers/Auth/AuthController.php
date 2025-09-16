<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
        'cf-turnstile-response' => 'required', // field dari turnstile
    ]);

    // Validasi Turnstile
    $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
        'secret'   => config('services.turnstile.secret_key'),
        'response' => $request->input('cf-turnstile-response'),
        'remoteip' => $request->ip(),
    ]);

    if (!$response->json('success')) {
        return back()->withErrors([
            'email' => 'Verifikasi keamanan gagal, coba lagi.',
        ]);
    }

    // Jika validasi Turnstile sukses → cek login
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return redirect()->route('dashboard')->with('success', 'Anda telah berhasil login.');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
