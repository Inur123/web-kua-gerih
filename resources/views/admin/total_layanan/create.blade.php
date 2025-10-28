@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-sm mb-8">
        <h3 class="font-semibold text-kemenag-green mb-6 text-lg">Tambah Total Layanan</h3>
        <form action="{{ route('total-layanan.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Pilih Layanan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Layanan</label>
                <select name="layanan_id" required
                    class="w-full px-4 py-3 border border-kemenag-green focus:outline-none rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('layanan_id')  @enderror">
                    <option value="">-- Pilih Layanan --</option>
                    @foreach ($layanans as $layanan)
                        <option value="{{ $layanan->id }}" {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}>
                            {{ $layanan->nama }}
                        </option>
                    @endforeach
                </select>
                @error('layanan_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal" required value="{{ old('tanggal') }}"
                    class="w-full px-4 py-3 border border-kemenag-green rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors focus:outline-none @error('tanggal') border-red-600 @enderror">

                @error('tanggal')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            {{-- Total --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Total</label>
                <input type="number" name="total" value="{{ old('total') }}" required min="0"
                    class="w-full px-4 py-3 border border-kemenag-green rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors focus:outline-none @error('total')  @enderror"
                    placeholder="Masukkan total">
                @error('total')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol aksi --}}
            <div class="flex justify-end gap-2">
                <a href="{{ route('total-layanan.index') }}"
                    class="px-4 py-2 border border-kemenag-green rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Batal</a>
                <button type="submit"
                    class="bg-kemenag-green text-white px-6 py-2 rounded-lg hover:bg-kemenag-light-green transition-colors cursor-pointer">Simpan</button>
            </div>
        </form>
    </div>
@endsection
