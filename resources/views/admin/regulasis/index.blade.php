@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
            <h3 class="font-semibold text-kemenag-green text-lg">Daftar Regulasi</h3>
            <a href="{{ route('regulasis.create') }}"
               class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors w-full sm:w-auto text-center">
                + Tambah Regulasi
            </a>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full divide-y divide-gray-200 text-sm table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">No</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Nama Regulasi</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden sm:table-cell">Deskripsi</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden md:table-cell">Status</th>

                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($regulasis as $regulasi)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <p class="text-sm font-medium text-gray-800">{{ $loop->iteration }}</p>
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-semibold text-gray-800">{{ $regulasi->nama }}</div>
                                <div class="text-xs text-gray-500 sm:hidden mt-1">
                                    <div>{{ Str::limit($regulasi->deskripsi, 60) }}</div>
                                    <div class="mt-1">
                                        <span class="px-2 py-1 rounded {{ $regulasi->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                            {{ ucfirst($regulasi->status) }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell">{{ Str::limit($regulasi->deskripsi, 60) }}</td>
                            <td class="px-4 py-3 hidden md:table-cell">
                                <span class="px-2 py-1 rounded {{ $regulasi->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                    {{ ucfirst($regulasi->status) }}
                                </span>
                            </td>

                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                    <a href="{{ route('regulasis.show', $regulasi->id) }}"
                                       class="text-blue-500 hover:underline text-center">Detail</a>
                                    <a href="{{ route('regulasis.edit', $regulasi->id) }}"
                                       class="text-kemenag-light-green hover:underline text-center">Edit</a>
                                    <form action="{{ route('regulasis.destroy', $regulasi->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline text-center"
                                                onclick="return confirm('Yakin hapus regulasi?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center text-gray-500">Belum ada regulasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
