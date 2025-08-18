<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function edit()
    {
        // Ambil banner pertama (id=1)
        $banner = Banner::first();

        // kalau belum ada, buat default biar tidak error
        if (!$banner) {
            $banner = Banner::create([
                'title' => 'Default Banner',
                'image' => 'default.jpg',
                'link'  => null,
                'status'=> true,
            ]);
        }

        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request)
    {
        $banner = Banner::first();

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'link'  => 'nullable|url',
        ]);

        $data = $request->only(['title', 'link']);
        $data['status'] = $request->status ? true : false;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
            $data['image'] = $path;
        }

        $banner->update($data);

        return redirect()->route('banner.edit')->with('success', 'Banner berhasil diperbarui');
    }
}
