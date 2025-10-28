<header class="bg-white shadow-md">
    <!-- Top Bar -->
    <div class="bg-kemenag-green text-white py-2">
        <div class="container mx-auto px-4 flex justify-between items-center text-xs sm:text-sm">
            <div class="flex items-center space-x-2 sm:space-x-4">
                <span class="flex items-center">
                    <i class="fas fa-envelope mr-1"></i>
                    <span class="hidden sm:inline">kua.gerih@gmail.com</span>
                    <span class="sm:hidden">kua.gerih@gmail.com</span>
                </span>
                <span class="flex items-center">
                    <i class="fas fa-phone mr-1"></i>
                    <span class="hidden sm:inline">081335852579</span>
                    <span class="sm:hidden">081335852579</span>
                </span>
            </div>
            <div class="hidden sm:flex items-center space-x-2">
                <span id="realtime-date" class="text-xs sm:text-sm"></span>
            </div>

        </div>
    </div>

    <!-- Main Header -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <!-- Kontainer Logo (diperbesar) -->
                <div class="w-22 h-22 md:w-24 md:h-24  flex items-center justify-center p-2 ">
                    <img src="{{ asset('images/logo-kua.png') }}" alt="Logo Kemenag"
                        class="w-full h-full object-contain"> <!-- Gunakan w-full untuk mengisi kontainer -->
                </div>

                <!-- Teks -->
                <div class="text-center md:text-left">
                    <h1 class="text-xl md:text-2xl font-bold text-kemenag-green">
                        KANTOR URUSAN AGAMA
                    </h1>
                    <p class="text-sm md:text-base text-gray-600">Kecamatan Gerih Kabupaten Ngawi</p>
                </div>
            </div>
            <div class="hidden lg:flex items-center space-x-4">
                <div class="text-right">
                    <p class="text-sm font-semibold text-kemenag-green">
                        Jam Pelayanan
                    </p>
                    <p class="text-xs text-gray-600">Senin - Kamis: 07:30 - 16:00</p>
                    <p class="text-xs text-gray-600">Jumat: 07:30 - 16:30</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-kemenag-light-green">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <!-- Desktop Navigation -->
                <ul class="hidden md:flex space-x-1 lg:space-x-8 text-white">
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-4 px-2 lg:px-4 hover:bg-kemenag-green transition-colors text-sm lg:text-base @if (request()->routeIs('home')) bg-kemenag-green @endif">Beranda</a>
                    </li>
                    <li class="relative group">
                        <a href="#"
                            class="block py-4 px-2 lg:px-4 hover:bg-kemenag-green transition-colors text-sm lg:text-base @if (request()->routeIs('profile.*')) bg-kemenag-green @endif">Profil
                            <i class="fas fa-chevron-down ml-1 text-xs"></i></a>
                        <ul
                            class="absolute top-full left-0 bg-white text-gray-800 shadow-lg min-w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                            <li>
                                <a href="{{ route('profile.sejarah') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 text-sm @if (request()->routeIs('profile.sejarah')) bg-gray-100 @endif">Profile
                                    dan Sejarah</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.visi-misi') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 text-sm @if (request()->routeIs('profile.visi-misi')) bg-gray-100 @endif">Visi
                                    & Misi</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.struktur-organisasi') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 text-sm @if (request()->routeIs('profile.struktur-organisasi')) bg-gray-100 @endif">Struktur
                                    Organisasi</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('layanan.index') }}"
                            class="block py-4 px-2 lg:px-4 hover:bg-kemenag-green transition-colors text-sm lg:text-base @if (request()->routeIs('layanan.*')) bg-kemenag-green @endif">Layanan</a>
                    </li>
                    <li>
                        <a href="{{ route('regulasi.index') }}"
                            class="block py-4 px-2 lg:px-4 hover:bg-kemenag-green transition-colors text-sm lg:text-base
       @if (request()->routeIs('regulasi.*')) bg-kemenag-green @endif">
                            Regulasi
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('berita.index') }}"
                            class="block py-4 px-2 lg:px-4 hover:bg-kemenag-green transition-colors text-sm lg:text-base @if (request()->routeIs('berita.*')) bg-kemenag-green @endif">
                            Berita
                        </a>
                    </li>
                    <!-- Menu Survei Kepuasan Baru -->
                    <li>
                        <a href="{{ route('survey.index') }}"
                            class="block py-4 px-2 lg:px-4 hover:bg-kemenag-green transition-colors text-sm lg:text-base @if (request()->routeIs('survey.*')) bg-kemenag-green @endif">
                            Survei Kepuasan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kontak.index') }}"
                            class="block py-4 px-2 lg:px-4 hover:bg-kemenag-green transition-colors text-sm lg:text-base @if (request()->routeIs('kontak.index')) bg-kemenag-green @endif">Kontak</a>
                    </li>
                </ul>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()"
                    class="md:hidden flex items-center space-x-2 text-white py-4 px-2 rounded-lg hover:bg-kemenag-green transition-colors relative z-50">
                    <i class="fas fa-bars text-lg"></i>
                    <span class="font-medium">Menu</span>
                </button>
            </div>
        </div>
    </nav>
    <div id="menu-overlay" class="fixed inset-0 bg-opacity-50 z-40 hidden md:hidden" onclick="closeMenu()">
    </div>

    <!-- Mobile Navigation Menu (Sidebar) -->
    <div id="mobile-menu"
        class="fixed top-0 left-0 h-full w-80 bg-kemenag-green shadow-2xl z-50 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
        <!-- Menu Header -->
        <div class="bg-kemenag-green p-6 border-b border-white border-opacity-20">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/logo-kua.png') }}" alt="Ikon Masjid"
                            class="w-10 h-10 object-contain">
                    </div>

                    <div>
                        <h3 class="text-white font-bold text-lg">KUA Kecamatan Gerih</h3>
                        <p class="text-kemenag-gold text-xs">Kantor Urusan Agama</p>
                    </div>
                </div>
                <button onclick="closeMenu()" class="text-white hover:text-kemenag-gold transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Menu Items -->
        <div class="py-4 h-full overflow-y-auto">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center py-4 px-6 text-white hover:bg-white hover:bg-opacity-10 transition-colors border-l-4 @if (request()->routeIs('home')) border-kemenag-gold bg-opacity-10 @else border-transparent hover:border-kemenag-gold @endif group">
                        <i class="fas fa-home w-6 mr-4 text-kemenag-gold group-hover:text-kemenag-gold"></i>
                        <span class="font-medium">Beranda</span>
                    </a>
                </li>

                <!-- Profil with Submenu -->
                <li class="border-t border-white border-opacity-10">
                    <div class="profil-menu">
                        <button onclick="toggleSubmenu('profil')"
                            class="flex items-center w-full py-4 px-6 text-white hover:bg-white hover:bg-opacity-10 transition-colors border-l-4 @if (request()->routeIs('profile.*')) border-kemenag-gold  bg-opacity-10 @else border-transparent hover:border-kemenag-gold @endif group">
                            <i class="fas fa-building w-6 mr-4 text-kemenag-gold"></i>
                            <span class="font-medium">Profil</span>
                            <i class="fas fa-chevron-right ml-auto transition-transform duration-200"
                                id="profil-icon"></i>
                        </button>
                        <div id="profil-submenu"
                            class="bg-kemenag-green bg-opacity-50 @if (request()->routeIs('profile.*')) block @else hidden @endif">
                            <a href="{{ route('profile.sejarah') }}"
                                class="block py-3 px-12 text-white text-sm hover:bg-white hover:bg-opacity-10 @if (request()->routeIs('profile.sejarah')) bg-opacity-10 @endif">Profil
                                dan Sejarah</a>
                            <a href="{{ route('profile.visi-misi') }}"
                                class="block py-3 px-12 text-white text-sm hover:bg-white hover:bg-opacity-10 @if (request()->routeIs('profile.visi-misi')) bg-opacity-10 @endif">Visi
                                & Misi</a>
                            <a href="{{ route('profile.struktur-organisasi') }}"
                                class="block py-3 px-12 text-white text-sm hover:bg-white hover:bg-opacity-10 @if (request()->routeIs('profile.struktur-organisasi')) bg-opacity-10 @endif">Struktur
                                Organisasi</a>

                        </div>
                    </div>
                </li>

                <!-- Layanan -->
                <li class="border-t border-white border-opacity-10">
                    <a href="{{ route('layanan.index') }}"
                        class="flex items-center py-4 px-6 text-white hover:bg-white hover:bg-opacity-10 transition-colors border-l-4
   @if (request()->is('layanan') || request()->is('layanan/*')) border-kemenag-gold bg-opacity-10
   @else border-transparent hover:border-kemenag-gold @endif group">
                        <i class="fas fa-cogs w-6 mr-4 text-kemenag-gold"></i>
                        <span class="font-medium">Layanan</span>
                    </a>
                </li>
                <li class="border-t border-white border-opacity-10">
                    <a href="{{ route('regulasi.index') }}"
                        class="flex items-center py-4 px-6 text-white hover:bg-white hover:bg-opacity-10 transition-colors border-l-4
       @if (request()->is('regulasi') || request()->is('regulasi/*')) border-kemenag-gold bg-opacity-10
       @else border-transparent hover:border-kemenag-gold @endif group">
                        <i class="fas fa-file-alt w-6 mr-4 text-kemenag-gold"></i>
                        <span class="font-medium">Regulasi</span>
                    </a>
                </li>



                <!-- Berita -->
                <li class="border-t border-white border-opacity-10">
                    <a href="{{ route('berita.index') }}"
                        class="flex items-center py-4 px-6 text-white hover:bg-white hover:bg-opacity-10 transition-colors border-l-4
    @if (request()->is('berita') || request()->is('berita/*')) border-kemenag-gold bg-opacity-10
    @else border-transparent hover:border-kemenag-gold @endif group">
                        <i class="fas fa-newspaper w-6 mr-4 text-kemenag-gold"></i>
                        <span class="font-medium">Berita</span>
                    </a>
                </li>

                <!-- Survei Kepuasan Baru -->
                <li class="border-t border-white border-opacity-10">
                    <a href="{{ route('survey.index') }}"
                        class="flex items-center py-4 px-6 text-white hover:bg-white hover:bg-opacity-10 transition-colors border-l-4
    @if (request()->is('survey') || request()->is('survey/*')) border-kemenag-gold bg-opacity-10
    @else border-transparent hover:border-kemenag-gold @endif group">
                        <i class="fas fa-clipboard-check w-6 mr-4 text-kemenag-gold"></i>
                        <span class="font-medium">Survei Kepuasan</span>
                    </a>
                </li>

                <!-- Kontak -->
                <li class="border-t border-white border-opacity-10">
                    <a href="{{ route('kontak.index') }}"
                        class="flex items-center py-4 px-6 text-white hover:bg-white hover:bg-opacity-10 transition-colors border-l-4 @if (request()->routeIs('kontak.index')) border-kemenag-gold  bg-opacity-10 @else border-transparent hover:border-kemenag-gold @endif group">
                        <i class="fas fa-phone w-6 mr-4 text-kemenag-gold"></i>
                        <span class="font-medium">Kontak</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
<script>
    function updateDateTime() {
        const now = new Date();
        const isMobile = window.innerWidth < 640; // Tailwind's sm breakpoint

        if (isMobile) {
            // Format untuk mobile: "Jumat, 15 Agustus 2025"
            const options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            document.getElementById('realtime-date').textContent = now.toLocaleDateString('id-ID', options);
        } else {
            // Format untuk desktop: dengan jam
            const options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            document.getElementById('realtime-date').textContent = now.toLocaleDateString('id-ID', options);
        }
    }

    // Update immediately
    updateDateTime();

    // Update every second
    setInterval(updateDateTime, 1000);

    // Update saat ukuran layar berubah
    window.addEventListener('resize', updateDateTime);
</script>
