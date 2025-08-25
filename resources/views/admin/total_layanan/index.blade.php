@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-4 rounded-lg shadow-sm mb-8">
    <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold text-kemenag-green text-lg">Daftar Total Layanan</h3>
        <a href="{{ route('total-layanan.create') }}"
            class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
            + Tambah Data
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($totalLayanans as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 whitespace-nowrap">
                            <p class="text-sm font-medium text-gray-800">
                                {{ ($totalLayanans->currentPage() - 1) * $totalLayanans->perPage() + $loop->iteration }}
                            </p>
                        </td>
                        <td class="px-4 py-3">{{ $item->layanan->nama ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $item->tahun }}</td>
                        <td class="px-4 py-3">{{ $item->total }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <a href="{{ route('total-layanan.edit', $item->id) }}"
                                class="text-kemenag-light-green hover:underline mr-3">Edit</a>
                            <form action="{{ route('total-layanan.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline"
                                    onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500">Belum ada data total layanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-4 py-3 border-t border-gray-200">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="text-sm text-gray-600">
                Menampilkan <span class="font-medium">{{ $totalLayanans->firstItem() }}</span> -
                <span class="font-medium">{{ $totalLayanans->lastItem() }}</span> dari
                <span class="font-medium">{{ $totalLayanans->total() }}</span> data
            </div>

            <div class="flex items-center space-x-1">
                {{-- Previous Page Link --}}
                @if ($totalLayanans->onFirstPage())
                    <span class="px-3 py-1 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $totalLayanans->previousPageUrl() }}"
                        class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                <div class="hidden sm:flex space-x-1">
                    @foreach ($totalLayanans->getUrlRange(max(1, $totalLayanans->currentPage() - 2), min($totalLayanans->lastPage(), $totalLayanans->currentPage() + 2)) as $page => $url)
                        @if ($page == $totalLayanans->currentPage())
                            <span class="px-3 py-1 rounded-md bg-kemenag-green text-white font-medium">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($totalLayanans->currentPage() < $totalLayanans->lastPage() - 2)
                        <span class="px-2 py-1 text-gray-500">...</span>
                        <a href="{{ $totalLayanans->url($totalLayanans->lastPage()) }}"
                            class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $totalLayanans->lastPage() }}</a>
                    @endif
                </div>

                {{-- Mobile Pagination --}}
                <div class="sm:hidden flex items-center">
                    <span class="px-3 py-1 rounded-md bg-gray-100 text-gray-700">{{ $totalLayanans->currentPage() }}</span>
                    <span class="mx-1 text-gray-500">/</span>
                    <span class="text-gray-600">{{ $totalLayanans->lastPage() }}</span>
                </div>

                {{-- Next Page Link --}}
                @if ($totalLayanans->hasMorePages())
                    <a href="{{ $totalLayanans->nextPageUrl() }}"
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
@endsection
