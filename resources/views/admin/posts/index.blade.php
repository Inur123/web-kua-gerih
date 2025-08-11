@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow-sm mb-8">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-kemenag-green text-lg">Daftar Berita</h3>
            <a href="{{ route('posts.create') }}"
               class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                + Tambah Berita
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Tanggal Publikasi</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <p class="text-sm font-medium text-gray-800">
                                    {{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}
                                </p>
                            </td>
                            <td class="px-4 py-3">{{ $post->title }}</td>
                            <td class="px-4 py-3">{{ $post->category->name ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded {{ $post->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'}}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d-m-Y') : '-' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <a href="{{ route('posts.show', $post->id) }}"
                                   class="text-blue-500 hover:underline mr-3">Lihat</a>
                                <a href="{{ route('posts.edit', $post->id) }}"
                                   class="text-kemenag-light-green hover:underline mr-3">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline"
                                        onclick="return confirm('Yakin hapus berita?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center text-gray-500">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-200">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600">
                    Menampilkan <span class="font-medium">{{ $posts->firstItem() }}</span> -
                    <span class="font-medium">{{ $posts->lastItem() }}</span> dari
                    <span class="font-medium">{{ $posts->total() }}</span> berita
                </div>

                <div class="flex items-center space-x-1">
                    {{-- Previous Page Link --}}
                    @if ($posts->onFirstPage())
                        <span class="px-3 py-1 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $posts->previousPageUrl() }}"
                            class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    <div class="hidden sm:flex space-x-1">
                        @foreach ($posts->getUrlRange(max(1, $posts->currentPage() - 2), min($posts->lastPage(), $posts->currentPage() + 2)) as $page => $url)
                            @if ($page == $posts->currentPage())
                                <span
                                    class="px-3 py-1 rounded-md bg-kemenag-green text-white font-medium">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Add ellipsis if needed --}}
                        @if ($posts->currentPage() < $posts->lastPage() - 2)
                            <span class="px-2 py-1 text-gray-500">...</span>
                            <a href="{{ $posts->url($posts->lastPage()) }}"
                                class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $posts->lastPage() }}</a>
                        @endif
                    </div>

                    {{-- Mobile Pagination (current page only) --}}
                    <div class="sm:hidden flex items-center">
                        <span
                            class="px-3 py-1 rounded-md bg-gray-100 text-gray-700">{{ $posts->currentPage() }}</span>
                        <span class="mx-1 text-gray-500">/</span>
                        <span class="text-gray-600">{{ $posts->lastPage() }}</span>
                    </div>

                    {{-- Next Page Link --}}
                    @if ($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}"
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
