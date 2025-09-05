@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-sm mb-8">
    <h3 class="font-semibold text-kemenag-green text-2xl mb-6">Tambah Regulasi</h3>
    <form action="{{ route('regulasis.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Regulasi</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required
                    class="w-full px-4 py-2 focus:outline-none border border-kemenag-green rounded-md focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" required class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-kemenag-green focus:border-transparent focus:outline-none border-kemenag-green">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full px-4 py-2 focus:outline-none border rounded-md focus:ring-2 focus:ring-kemenag-green focus:border-transparent border-kemenag-green">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end gap-2 mt-8">
            <a href="{{ route('regulasis.index') }}" class="px-4 py-2 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200">Batal</a>
            <button type="submit" class="px-4 py-2 rounded-md bg-kemenag-green text-white hover:bg-kemenag-light-green cursor-pointer">Simpan</button>
        </div>
    </form>
</div>
@endsection
