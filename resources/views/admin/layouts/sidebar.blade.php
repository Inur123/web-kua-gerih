<aside id="sidebar"
    class="bg-kemenag-green text-white w-64 h-full fixed top-0 left-0 z-30 flex-col hidden md:flex transition-all duration-300">
    <div class="flex items-center space-x-3 mb-8 p-4 mt-2">
    <div class="p-2 rounded-lg flex items-center justify-center">
        <img src="{{ asset('images/logo-kua.png') }}" alt="Logo" class="w-6 h-6">
    </div>
    <h1 class="font-bold text-sm">Dashboard KUA Gerih</h1>
</div>

    <nav class="px-2 flex-1 overflow-y-auto">
        <div class="space-y-1">
            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-3 {{ request()->routeIs('dashboard') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                <i class="fas fa-tachometer-alt w-5"></i>
                <span>Dashboard</span>
            </a>
            <div class="mt-4">
                <p class="text-xs uppercase text-gray-300 px-3 mb-2">
                    Menu Utama
                </p>

                <!-- Kelola Berita Dropdown -->
                <div class="dropdown-group">
                    <button
                        class="dropdown-btn flex items-center justify-between w-full hover:bg-kemenag-light-green p-3 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-users w-5"></i>
                            <span>Kelola Berita</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                    </button>
                    <div class="dropdown-content hidden pl-4 mt-1 space-y-1">
                        <a href="{{ route('categories.index') }}"
                            class="flex items-center space-x-3 {{ request()->routeIs('categories.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                            <i class="fas fa-list w-5"></i>
                            <span>Category</span>
                        </a>
                        <a href="{{ route('posts.index') }}"
                            class="flex items-center space-x-3 {{ request()->routeIs('posts.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                            <i class="fas fa-plus w-5"></i>
                            <span>Berita</span>
                        </a>
                    </div>
                </div>
                <a href="{{ route('layanans.index') }}"
                    class="flex items-center space-x-3 {{ request()->routeIs('layanans.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                    <i class="fas fa-kaaba w-5"></i>
                    <span>Layanan</span>
                </a>
                <a href="{{ route('regulasis.index') }}"
                    class="flex items-center space-x-3 {{ request()->routeIs('regulasis.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                    <i class="fas fa-book w-5"></i>
                    <span>Regulasi</span>
                </a>
                 <a href="{{ route('admin.survey.index') }}"
                    class="flex items-center space-x-3 {{ request()->routeIs('admin.survey.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                    <i class="fas fa-poll w-5"></i>
                    <span>Survey Layanan</span>
                </a>
                <a href="{{ route('galeri_pamflet.index') }}"
    class="flex items-center space-x-3 {{ request()->routeIs('admin.galeri_pamflet.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
    <i class="fas fa-image w-5"></i>
    <span>Galeri Pamflet</span>
</a>

                <div class="dropdown-group">
                    <button
                        class="dropdown-btn flex items-center justify-between w-full hover:bg-kemenag-light-green p-3 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-users w-5"></i>
                            <span>Pengaturan</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                    </button>
                    <div class="dropdown-content hidden pl-4 mt-1 space-y-1">
                        <a href="{{ route('banner.edit') }}"
                            class="flex items-center space-x-3 {{ request()->routeIs('banner.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                            <i class="fas fa-list w-5"></i>
                            <span>Banner</span>
                        </a>
                        <a href="{{ route('total-layanan.index') }}"
                            class="flex items-center space-x-3 {{ request()->routeIs('total-layanan.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                            <i class="fas fa-chart-bar w-5"></i>
                            <span>Total Layanan</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</aside>

<!-- Sidebar Mobile Overlay -->
<div id="sidebarMobileOverlay" class="fixed inset-0 bg-opacity-40 z-30 hidden md:hidden"></div>

<!-- Sidebar Mobile -->
<div id="sidebarMobile"
    class="sidebar-overlay fixed top-0 left-0 h-full w-64 bg-kemenag-green text-white z-40 transform -translate-x-full transition-transform duration-300 flex flex-col md:hidden">
    <div class="flex items-center justify-between p-4 mt-2 mb-4">
        <div class="flex items-center space-x-3">
            <div class=" text-kemenag-green p-2 rounded-lg">
                <img src="{{ asset('images/logo-kua.png') }}" alt="Logo" class="w-8 h-8">
            </div>
            <h1 class="font-bold text-sm">Dashboard <br>KUA Gerih</h1>
        </div>
        <button id="closeSidebarBtn" class="text-white text-2xl focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <nav class="px-2 flex-1 overflow-y-auto">
        <div class="space-y-1">
            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-3 {{ request()->routeIs('dashboard') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                <i class="fas fa-tachometer-alt w-5"></i>
                <span>Dashboard</span>
            </a>
            <div class="mt-4">
                <p class="text-xs uppercase text-gray-300 px-3 mb-2">
                    Menu Utama
                </p>

                <!-- Kelola Berita Dropdown (Mobile) -->
                <div class="dropdown-group">
                    <button
                        class="dropdown-btn flex items-center justify-between w-full hover:bg-kemenag-light-green p-3 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-users w-5"></i>
                            <span>Kelola Berita</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                    </button>
                    <div class="dropdown-content hidden pl-4 mt-1 space-y-1">
                        <a href="{{ route('categories.index') }}"
                            class="flex items-center space-x-3 {{ request()->routeIs('categories.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                            <i class="fas fa-list w-5"></i>
                            <span>Category</span>
                        </a>
                        <a href="{{ route('posts.index') }}"
                            class="flex items-center space-x-3 {{ request()->routeIs('posts.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                            <i class="fas fa-plus w-5"></i>
                            <span>Berita</span>
                        </a>
                    </div>
                </div>

                <a href="{{ route('layanans.index') }}"
                    class="flex items-center space-x-3 {{ request()->routeIs('layanans.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                    <i class="fas fa-kaaba w-5"></i>
                    <span>Layanan</span>
                </a>
                <a href="{{ route('regulasis.index') }}"
                    class="flex items-center space-x-3 {{ request()->routeIs('regulasis.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                    <i class="fas fa-book w-5"></i>
                    <span>Regulasi</span>
                </a>
                 <a href="{{ route('admin.survey.index') }}"
                    class="flex items-center space-x-3 {{ request()->routeIs('admin.survey.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                    <i class="fas fa-poll w-5"></i>
                    <span>Survey Layanan</span>
                </a>
                <a href="{{ route('galeri_pamflet.index') }}"
    class="flex items-center space-x-3 {{ request()->routeIs('admin.galeri_pamflet.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
    <i class="fas fa-image w-5"></i>
    <span>Galeri Pamflet</span>
</a>

                <div class="dropdown-group">
                    <button
                        class="dropdown-btn flex items-center justify-between w-full hover:bg-kemenag-light-green p-3 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-users w-5"></i>
                            <span>Pengaturan</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                    </button>
                    <div class="dropdown-content hidden pl-4 mt-1 space-y-1">
                        <a href="{{ route('banner.edit') }}"
                            class="flex items-center space-x-3 {{ request()->routeIs('banner.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                            <i class="fas fa-list w-5"></i>
                            <span>Banner</span>
                        </a>
                        <a href="{{ route('total-layanan.index') }}"
                            class="flex items-center space-x-3 {{ request()->routeIs('total-layanan.*') ? 'bg-kemenag-light-green' : 'hover:bg-kemenag-light-green' }} p-3 rounded-lg">
                            <i class="fas fa-chart-bar w-5"></i>
                            <span>Total Layanan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
