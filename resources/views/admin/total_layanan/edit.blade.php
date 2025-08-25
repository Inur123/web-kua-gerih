@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm mb-8">
    <h3 class="font-semibold text-kemenag-green mb-6 text-lg">Edit Total Layanan</h3>
    <form action="{{ route('total-layanan.update', $totalLayanan->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Pilih Layanan --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Layanan</label>
            <select name="layanan_id" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('layanan_id') border-red-500 @enderror">
                <option value="">-- Pilih Layanan --</option>
                @foreach($layanans as $layanan)
                    <option value="{{ $layanan->id }}" {{ old('layanan_id', $totalLayanan->layanan_id) == $layanan->id ? 'selected' : '' }}>
                        {{ $layanan->nama }}
                    </option>
                @endforeach
            </select>
            @error('layanan_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tahun --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
            <input type="number" name="tahun" value="{{ old('tahun', $totalLayanan->tahun) }}" required min="2000" max="2100"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('tahun') border-red-500 @enderror"
                placeholder="Masukkan tahun">
            @error('tahun')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Total --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Total</label>
            <input type="number" name="total" value="{{ old('total', $totalLayanan->total) }}" required min="0"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('total') border-red-500 @enderror"
                placeholder="Masukkan total">
            @error('total')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol aksi --}}
        <div class="flex justify-end gap-2">
            <a href="{{ route('total-layanan.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Batal</a>
            <button type="submit" class="bg-kemenag-green text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">Update</button>
        </div>
    </form>
</div>
@endsection
