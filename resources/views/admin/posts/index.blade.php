@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-4 sm:space-y-0">
            <h3 class="font-semibold text-kemenag-green text-lg">Daftar Berita</h3>
            <a href="{{ route('posts.create') }}"
               class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors w-full sm:w-auto text-center">
                + Tambah Berita
            </a>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full divide-y divide-gray-200 text-sm table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">No</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Judul</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden sm:table-cell">Kategori</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden md:table-cell">Status</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap hidden lg:table-cell">Tanggal Publikasi</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Aksi</th>
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
                            <td class="px-4 py-3">
                                <div class="text-sm text-gray-800">{{ $post->title }}</div>
                                <div class="text-xs text-gray-500 sm:hidden mt-1">
                                    <div>{{ $post->category->name ?? '-' }}</div>
                                    <div class="mt-1">
                                        <span class="px-2 py-1 rounded {{ $post->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'}}">
                                            {{ ucfirst($post->status) }}
                                        </span>
                                    </div>
                                    <div class="mt-1">
                                        {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d-m-Y') : '-' }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell">{{ $post->category->name ?? '-' }}</td>
                            <td class="px-4 py-3 hidden md:table-cell">
                                <span class="px-2 py-1 rounded {{ $post->status == 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'}}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap hidden lg:table-cell">
                                {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d-m-Y') : '-' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                    <a href="{{ route('posts.show', $post->id) }}"
                                       class="text-blue-500 hover:underline text-center">Lihat</a>
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                       class="text-kemenag-light-green hover:underline text-center">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline text-center"
                                            onclick="return confirm('Yakin hapus berita?')">Hapus</button>
                                    </form>
                                </div>
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
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600">
                    Menampilkan <span class="font-medium">{{ $posts->firstItem() }}</span> -
                    <span class="font-medium">{{ $posts->lastItem() }}</span> dari
                    <span class="font-medium">{{ $posts->total() }}</span> berita
                </div>

                <div class="flex items-center space-x-2">
                    <!-- Previous Page Link -->
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

                    <!-- Pagination Elements -->
                    <div class="hidden sm:flex space-x-2">
                        @foreach ($posts->getUrlRange(max(1, $posts->currentPage() - 2), min($posts->lastPage(), $posts->currentPage() + 2)) as $page => $url)
                            @if ($page == $posts->currentPage())
                                <span
                                    class="px-3 py-1 rounded-md bg-kemenag-green text-white font-medium">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        <!-- Add ellipsis if needed -->
                        @if ($posts->currentPage() < $posts->lastPage() - 2)
                            <span class="px-2 py-1 text-gray-500">...</span>
                            <a href="{{ $posts->url($posts->lastPage()) }}"
                                class="px-3 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">{{ $posts->lastPage() }}</a>
                        @endif
                    </div>

                    <!-- Mobile Pagination (current page only) -->
                    <div class="sm:hidden flex items-center">
                        <span
                            class="px-3 py-1 rounded-md bg-gray-100 text-gray-700">{{ $posts->currentPage() }}</span>
                        <span class="mx-1 text-gray-500">/</span>
                        <span class="text-gray-600">{{ $posts->lastPage() }}</span>
                    </div>

                    <!-- Next Page Link -->
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
