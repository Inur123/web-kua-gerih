@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm mb-8">
    <h3 class="font-semibold text-kemenag-green mb-6 text-lg">Tambah Kategori</h3>
    <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full px-4 py-3 border border-kemenag-green rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent  focus:outline-none @error('name')  @enderror"
                placeholder="Masukkan nama kategori">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('categories.index') }}" class="px-4 py-2 border border-kemenag-green rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Batal</a>
            <button type="submit" class="bg-kemenag-green text-white px-6 py-2 rounded-lg hover:bg-kemenag-light-green transition-colors cursor-pointer">Simpan</button>
        </div>
    </form>
</div>
@endsection
