<!-- Sidebar -->
<div class="lg:col-span-1">
    <!-- Search  -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h3 class="font-bold text-kemenag-green mb-4">Cari Berita</h3>
        <div class="flex">
            <input type="text" placeholder="Kata kunci..."
                class="flex-1 px-3 py-2 border border-gray-300 rounded-l focus:outline-none focus:border-kemenag-green">
            <button class="bg-kemenag-green text-white px-4 py-2 rounded-r hover:bg-kemenag-light-green">
                🔍
            </button>
        </div>
    </div>

    <!-- Categories  -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h3 class="font-bold text-kemenag-green mb-4">Kategori</h3>
        <ul class="space-y-2 text-sm">
            <li>
                <a href="" class="text-gray-700 hover:text-kemenag-green">
                    Semua Berita ({{ $categories->sum('posts_count') }})
                </a>
            </li>
            @foreach ($categories as $category)
                <li>
                    <a href="" class="text-gray-700 hover:text-kemenag-green">
                        {{ $category->name }} ({{ $category->posts_count }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Recent News  -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h3 class="font-bold text-kemenag-green mb-4">Berita Terpopuler</h3>
        <div class="space-y-4">
            @foreach ($popularPosts as $popular)
                <a href="{{ route('berita.show', $popular->slug) }}" class="block hover:bg-gray-50 rounded">
                    <article class="flex space-x-3">
                        <img src="{{ $popular->thumbnail ? asset('storage/' . $popular->thumbnail) : asset('images/gambar-kua.png') }}"
                            alt="{{ $popular->title }}" class="w-20 h-15 object-cover rounded">
                        <div class="flex-1">
                            <h4 class="text-sm font-semibold text-gray-800 mb-1">
                                {{ $popular->title }}
                            </h4>
                            <p class="text-xs text-gray-500">{{ $popular->views }} views</p>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>
    </div>
</div>
