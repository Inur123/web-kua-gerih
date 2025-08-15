@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm mb-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-semibold text-kemenag-green text-lg">Daftar Layanan</h3>
        <a href="{{ route('layanans.create') }}" class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-green-700">
            + Tambah Layanan
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase">No</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase">Nama Layanan</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($layanans as $layanan)
                <tr>
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 font-semibold">{{ $layanan->nama }}</td>
                    <td class="px-4 py-3">{{ Str::limit($layanan->deskripsi, 60) }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded {{ $layanan->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                            {{ ucfirst($layanan->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <a href="{{ route('layanans.show', $layanan->id) }}" class="text-blue-500 hover:underline mr-2">Detail</a>
                        <a href="{{ route('layanans.edit', $layanan->id) }}" class="text-kemenag-light-green hover:underline mr-2">Edit</a>
                        <form action="{{ route('layanans.destroy', $layanan->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Yakin hapus layanan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-3 text-center text-gray-500">Belum ada layanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
