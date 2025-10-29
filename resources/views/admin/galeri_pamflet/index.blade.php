@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-4 sm:space-y-0">
        <h3 class="font-semibold text-kemenag-green text-lg">Daftar Galeri Pamflet</h3>
        <a href="{{ route('galeri_pamflet.create') }}"
           class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-kemenag-light-green transition-colors w-full sm:w-auto text-center">
            + Tambah Galeri Pamflet
        </a>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full divide-y divide-gray-200 text-sm table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">No</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Title</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden sm:table-cell">Tanggal</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden md:table-cell">Status</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden md:table-cell">Gambar</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($galeriPamflets as $pamflet)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ ($galeriPamflets->currentPage() - 1) * $galeriPamflets->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-sm text-gray-800">{{ $pamflet->title }}</div>
                            <div class="text-xs text-gray-500 sm:hidden mt-1">
                                <div class="mt-1">
                                    <span class="px-2 py-1 rounded {{ $pamflet->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                        {{ ucfirst($pamflet->status) }}
                                    </span>
                                </div>
                                <div class="mt-1">
                                    {{ \Carbon\Carbon::parse($pamflet->tanggal)->format('d-m-Y') }}
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell">{{ \Carbon\Carbon::parse($pamflet->tanggal)->format('d-m-Y') }}</td>
                        <td class="px-4 py-3 hidden md:table-cell">
                            <span class="px-2 py-1 rounded {{ $pamflet->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                {{ ucfirst($pamflet->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell">
                            @if($pamflet->gambar)
                                <img src="{{ asset('storage/' . $pamflet->gambar) }}" alt="Gambar" class="w-20 h-12 object-cover rounded">
                            @else
                                <span class="text-gray-400">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                <a href="{{ route('galeri_pamflet.edit', $pamflet->id) }}"
                                   class="text-kemenag-light-green hover:underline text-center">Edit</a>
                                <form action="{{ route('galeri_pamflet.destroy', $pamflet->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline text-center cursor-pointer"
                                            onclick="return confirm('Yakin hapus pamflet?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-500">Belum ada galeri pamflet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-4 py-3 border-t border-gray-200">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-sm text-gray-600">
                Menampilkan <span class="font-medium">{{ $galeriPamflets->firstItem() }}</span> -
                <span class="font-medium">{{ $galeriPamflets->lastItem() }}</span> dari
                <span class="font-medium">{{ $galeriPamflets->total() }}</span> pamflet
            </div>

            <div class="flex items-center space-x-2">
                @if ($galeriPamflets->onFirstPage())
                    <span class="px-3 py-1 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $galeriPamflets->previousPageUrl() }}"
                        class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                <div class="hidden sm:flex space-x-2">
                    @foreach ($galeriPamflets->getUrlRange(max(1, $galeriPamflets->currentPage() - 2), min($galeriPamflets->lastPage(), $galeriPamflets->currentPage() + 2)) as $page => $url)
                        @if ($page == $galeriPamflets->currentPage())
                            <span class="px-3 py-1 rounded-md bg-kemenag-green text-white font-medium">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($galeriPamflets->currentPage() < $galeriPamflets->lastPage() - 2)
                        <span class="px-2 py-1 text-gray-500">...</span>
                        <a href="{{ $galeriPamflets->url($galeriPamflets->lastPage()) }}"
                            class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $galeriPamflets->lastPage() }}</a>
                    @endif
                </div>

                <div class="sm:hidden flex items-center">
                    <span class="px-3 py-1 rounded-md bg-gray-100 text-gray-700">{{ $galeriPamflets->currentPage() }}</span>
                    <span class="mx-1 text-gray-500">/</span>
                    <span class="text-gray-600">{{ $galeriPamflets->lastPage() }}</span>
                </div>

                @if ($galeriPamflets->hasMorePages())
                    <a href="{{ $galeriPamflets->nextPageUrl() }}"
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
