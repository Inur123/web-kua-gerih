@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
            <h3 class="font-semibold text-kemenag-green text-lg">Daftar Layanan</h3>
            <a href="{{ route('layanans.create') }}"
               class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-kemenag-light-green  transition-colors w-full sm:w-auto text-center">
                + Tambah Layanan
            </a>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full divide-y divide-gray-200 text-sm table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">No</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Nama Layanan</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden sm:table-cell">Deskripsi</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden md:table-cell">Status</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($layanans as $layanan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">
                                 {{ ($layanans->currentPage() - 1) * $layanans->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm  text-gray-800">{{ $layanan->nama }}</div>
                                <div class="text-xs text-gray-500 sm:hidden mt-1">
                                    <div>{{ Str::limit($layanan->deskripsi, 60) }}</div>
                                    <div class="mt-1">
                                        <span class="px-2 py-1 rounded {{ $layanan->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                            {{ ucfirst($layanan->status) }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell">{{ Str::limit($layanan->deskripsi, 60) }}</td>
                            <td class="px-4 py-3 hidden md:table-cell">
                                <span class="px-2 py-1 rounded {{ $layanan->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                    {{ ucfirst($layanan->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                    <a href="{{ route('layanans.show', $layanan->id) }}"
                                       class="text-blue-500 hover:underline text-center">Detail</a>
                                    <a href="{{ route('layanans.edit', $layanan->id) }}"
                                       class="text-kemenag-light-green hover:underline text-center">Edit</a>
                                    <form action="{{ route('layanans.destroy', $layanan->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline text-center"
                                                onclick="return confirm('Yakin hapus layanan?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500">Belum ada layanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
<div class="px-4 py-3 border-t border-gray-200">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="text-sm text-gray-600">
            Menampilkan <span class="font-medium">{{ $layanans->firstItem() }}</span> -
            <span class="font-medium">{{ $layanans->lastItem() }}</span> dari
            <span class="font-medium">{{ $layanans->total() }}</span> layanan
        </div>

        <div class="flex items-center space-x-2">
            <!-- Previous Page Link -->
            @if ($layanans->onFirstPage())
                <span class="px-3 py-1 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $layanans->previousPageUrl() }}"
                   class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            <!-- Pagination Numbers -->
            <div class="hidden sm:flex space-x-2">
                @foreach ($layanans->getUrlRange(max(1, $layanans->currentPage() - 2), min($layanans->lastPage(), $layanans->currentPage() + 2)) as $page => $url)
                    @if ($page == $layanans->currentPage())
                        <span class="px-3 py-1 rounded-md bg-kemenag-green text-white font-medium">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                           class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $page }}</a>
                    @endif
                @endforeach
                @if ($layanans->currentPage() < $layanans->lastPage() - 2)
                    <span class="px-2 py-1 text-gray-500">...</span>
                    <a href="{{ $layanans->url($layanans->lastPage()) }}"
                       class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $layanans->lastPage() }}</a>
                @endif
            </div>

            <!-- Mobile Pagination -->
            <div class="sm:hidden flex items-center">
                <span class="px-3 py-1 rounded-md bg-gray-100 text-gray-700">{{ $layanans->currentPage() }}</span>
                <span class="mx-1 text-gray-500">/</span>
                <span class="text-gray-600">{{ $layanans->lastPage() }}</span>
            </div>

            <!-- Next Page Link -->
            @if ($layanans->hasMorePages())
                <a href="{{ $layanans->nextPageUrl() }}"
                   class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span class="px-3 py-1 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </span>
            @endif
        </div>
    </div>
</div>

        </div>
    </div>
@endsection
