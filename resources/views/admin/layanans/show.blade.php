@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm mb-8">
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h3 class="font-semibold text-kemenag-green text-2xl mb-2">{{ $layanan->nama }}</h3>
            <span class="inline-block px-3 py-1 rounded-full text-xs {{ $layanan->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ $layanan->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
            </span>
        </div>
        <div class="mt-4 md:mt-0 flex gap-2">
            <a href="{{ route('layanans.edit', $layanan->id) }}" class="px-4 py-2 rounded-lg bg-kemenag-green text-white hover:bg-green-700">Edit</a>
            <a href="{{ route('layanans.index') }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">Kembali</a>
        </div>
    </div>

    <div class="mb-6">
        <h4 class="font-semibold text-gray-700 mb-2">Deskripsi</h4>
        <div class="bg-gray-50 rounded p-4 text-gray-700">{{ $layanan->deskripsi }}</div>
    </div>

    <div>
        <h4 class="font-semibold text-gray-700 mb-2">Persyaratan</h4>
        @if($layanan->persyaratans->count())
            <div class="grid md:grid-cols-2 gap-4">
                @foreach($layanan->persyaratans as $syarat)
                <div class="border border-gray-300 rounded-lg p-4 bg-white shadow-sm flex flex-col gap-1">
                    <span class="font-medium text-kemenag-green">{{ $syarat->nama }}</span>
                    @if($syarat->deskripsi)
                        <span class="text-sm text-gray-600">{{ $syarat->deskripsi }}</span>
                    @endif
                    @if($syarat->link_download)
                        <a href="{{ $syarat->link_download }}" target="_blank" class="text-blue-500 text-xs hover:underline">Download</a>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Belum ada persyaratan.</p>
        @endif
    </div>
</div>
@endsection
