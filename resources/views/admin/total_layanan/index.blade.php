@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-8">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3">
            <h3 class="font-semibold text-kemenag-green text-base sm:text-lg">Daftar Total Layanan</h3>
            <a href="{{ route('total-layanan.create') }}"
                class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-kemenag-light-green transition-colors text-sm sm:text-base text-center">
                <i class="fas fa-plus mr-1"></i> Tambah Data
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 sm:px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-3 sm:px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Layanan</th>
                        <th class="px-3 sm:px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider hidden md:table-cell">Tanggal</th>
                        <th class="px-3 sm:px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Total</th>
                        <th class="px-3 sm:px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($totalLayanans as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-3 sm:px-4 py-3 whitespace-nowrap text-xs sm:text-sm">
                                {{ ($totalLayanans->currentPage() - 1) * $totalLayanans->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-3 sm:px-4 py-3 text-xs sm:text-sm">
                                {{ $item->layanan->nama ?? '-' }}
                            </td>
                            <td class="px-3 sm:px-4 py-3 text-xs sm:text-sm hidden md:table-cell whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                            </td>
                            <td class="px-3 sm:px-4 py-3 text-xs sm:text-sm font-medium">
                                {{ number_format($item->total, 0, ',', '.') }}
                            </td>
                            <td class="px-3 sm:px-4 py-3 whitespace-nowrap">
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                                    <a href="{{ route('total-layanan.edit', $item->id) }}"
                                        class="px-2 sm:px-3 py-1.5 text-xs bg-kemenag-light-green text-white rounded-md hover:bg-green-600 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('total-layanan.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 sm:px-3 py-1.5 text-xs bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors"
                                            onclick="return confirm('Yakin hapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 sm:px-4 py-8 text-center text-gray-500 text-xs sm:text-sm">
                                Belum ada data total layanan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 sm:mt-6 pt-4 border-t border-gray-200">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-xs sm:text-sm text-gray-600 text-center sm:text-left">
                    Menampilkan <span class="font-medium">{{ $totalLayanans->firstItem() ?? 0 }}</span> -
                    <span class="font-medium">{{ $totalLayanans->lastItem() ?? 0 }}</span> dari
                    <span class="font-medium">{{ $totalLayanans->total() ?? 0 }}</span> data
                </div>

                <div class="flex items-center space-x-2">
                    {{-- Previous Page Link --}}
                    @if ($totalLayanans->onFirstPage())
                        <span class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed text-sm">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $totalLayanans->previousPageUrl() }}"
                            class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors text-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    <div class="hidden sm:flex space-x-2">
                        @foreach ($totalLayanans->getUrlRange(max(1, $totalLayanans->currentPage() - 2), min($totalLayanans->lastPage(), $totalLayanans->currentPage() + 2)) as $page => $url)
                            @if ($page == $totalLayanans->currentPage())
                                <span class="px-3 py-1.5 rounded-md bg-kemenag-green text-white font-medium text-sm">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors text-sm">{{ $page }}</a>
                            @endif
                        @endforeach
                        @if ($totalLayanans->currentPage() < $totalLayanans->lastPage() - 2)
                            <span class="px-2 py-1 text-gray-500">...</span>
                            <a href="{{ $totalLayanans->url($totalLayanans->lastPage()) }}"
                                class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors text-sm">{{ $totalLayanans->lastPage() }}</a>
                        @endif
                    </div>

                    {{-- Mobile Pagination --}}
                    <div class="sm:hidden flex items-center gap-2">
                        <span class="px-3 py-1.5 rounded-md bg-gray-100 text-gray-700 text-sm">{{ $totalLayanans->currentPage() }}</span>
                        <span class="text-gray-500">/</span>
                        <span class="text-gray-600 text-sm">{{ $totalLayanans->lastPage() }}</span>
                    </div>

                    {{-- Next Page Link --}}
                    @if ($totalLayanans->hasMorePages())
                        <a href="{{ $totalLayanans->nextPageUrl() }}"
                            class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors text-sm">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed text-sm">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
