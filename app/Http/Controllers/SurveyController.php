<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SurveyController extends Controller
{
    public function index()
    {
        return view('user.survey');
    }

    public function store(Request $request)
    {
        // Validasi awal termasuk captcha
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'name' => 'required|string|max:100',
            'email' => 'nullable|email',
            'feedback' => 'nullable|string',
            'cf-turnstile-response' => 'required', // field captcha dari Turnstile
        ], [
            'rating.required' => 'Silakan pilih tingkat kepuasan Anda!',
            'rating.integer' => 'Rating tidak valid.',
            'rating.min' => 'Rating tidak valid.',
            'rating.max' => 'Rating tidak valid.',
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama terlalu panjang.',
            'email.email' => 'Email tidak valid.',
            'cf-turnstile-response.required' => 'Silakan verifikasi keamanan terlebih dahulu.',
        ]);

        // Verifikasi CAPTCHA ke Cloudflare Turnstile
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret'   => config('services.turnstile.secret_key'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$response->json('success')) {
            return back()->withErrors([
                'cf-turnstile-response' => 'Verifikasi keamanan gagal, silakan coba lagi.',
            ])->withInput();
        }

        // Simpan hasil survei
        Survey::create($request->only(['rating', 'name', 'email', 'feedback']));

        return redirect()->back()->with('success', 'Terima kasih sudah mengisi survei!');
    }
}
