@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg mb-8 w-full">
    <h3 class="font-semibold text-kemenag-green text-2xl mb-8">Edit Galeri Pamflet</h3>
    <form action="{{ route('galeri_pamflet.update', $galeriPamflet->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Pamflet</label>
            <input type="text" name="title" value="{{ old('title', $galeriPamflet->title) }}" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                focus:outline-none focus:border-kemenag-green focus:ring-2 focus:ring-kemenag-green transition duration-200" />
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $galeriPamflet->tanggal) }}" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                focus:outline-none focus:border-kemenag-green focus:ring-2 focus:ring-kemenag-green transition duration-200" />
            @error('tanggal')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status Pamflet</label>
            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="active" {{ old('status', $galeriPamflet->status) == 'active' ? 'checked' : '' }}
                        class="accent-kemenag-green focus:ring-kemenag-green">
                    <span class="ml-2 text-black font-medium">Aktif</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="inactive" {{ old('status', $galeriPamflet->status) == 'inactive' ? 'checked' : '' }}
                        class="accent-kemenag-green focus:ring-kemenag-green">
                    <span class="ml-2 text-red-500 font-medium">Tidak Aktif</span>
                </label>
            </div>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Pamflet</label>
            <input type="file" name="gambar" accept="image/*"
                class="w-full px-4 py-3 border border-kemenag-green rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition">
            @if ($galeriPamflet->gambar)
                <div class="mt-4 flex flex-col items-start gap-2">
                    <span class="text-xs text-gray-500">Preview Gambar Saat Ini:</span>
                    <img src="{{ asset('storage/' . $galeriPamflet->gambar) }}" alt="Pamflet"
                        class="h-40 rounded-lg shadow border border-gray-200">
                </div>
            @endif
            @error('gambar')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

       <div class="flex justify-end gap-2 mt-8">
    <a href="{{ route('galeri_pamflet.index') }}"
       class="px-6 py-2 rounded-lg bg-gray-300 text-gray-700 font-semibold hover:bg-gray-400 transition text-center">
        Batal
    </a>
    <button type="submit"
        class="px-6 py-2 rounded-lg bg-kemenag-green text-white font-semibold hover:bg-green-700 transition">
        Simpan
    </button>
</div>

    </form>
</div>
@endsection
