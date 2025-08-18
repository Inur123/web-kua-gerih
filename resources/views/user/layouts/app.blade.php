<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>KUA Kecamatan Gerih - Kantor Urusan Agama</title>
    <meta name="description" content="Kantor Urusan Agama (KUA) Kecamatan Gerih menyediakan layanan pernikahan islami, pencatatan nikah, dispensasi nikah, rujuk, dan layanan keagamaan resmi di wilayah Kecamatan Gerih">
    <meta name="keywords" content="KUA Gerih, Nikah Gerih, Kantor Urusan Agama Gerih, Pernikahan Islam, Pencatatan Nikah, Dispensasi Nikah, Rujuk, Layanan KUA, Kecamatan Gerih, Kabupaten Ngawi">
    <meta name="author" content="KUA Kecamatan Gerih">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="Indonesian">
    <meta name="geo.region" content="ID-JI">
    <meta name="geo.placename" content="Gerih, Ngawi, Jawa Timur">
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-kua.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('images/logo-kua.png') }}">

    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="KUA Kecamatan Gerih | Layanan Nikah & Catatan Sipil Islam">
    <meta property="og:description" content="Pelayanan resmi pernikahan islami, pencatatan nikah, dispensasi nikah dan layanan keagamaan di Kecamatan Gerih">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.kua-gerih.com">
    <meta property="og:image" content="{{ asset('images/logo-kua.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="KUA Kecamatan Gerih">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="KUA Kecamatan Gerih | Layanan Nikah & Catatan Sipil Islam">
    <meta name="twitter:description" content="Pelayanan resmi pernikahan islami dan catatan sipil untuk Kecamatan Gerih">
    <meta name="twitter:image" content="{{ asset('images/logo-kua.png') }}">

    <!-- CSS & Fonts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById("mobile-menu");
            const overlay = document.getElementById("menu-overlay");

            mobileMenu.classList.toggle("-translate-x-full");
            overlay.classList.toggle("hidden");
            document.body.classList.toggle("overflow-hidden");
        }

        // Close menu when clicking overlay
        function closeMenu() {
            const mobileMenu = document.getElementById("mobile-menu");
            const overlay = document.getElementById("menu-overlay");

            mobileMenu.classList.add("-translate-x-full");
            overlay.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        }

        function toggleSubmenu(menuName) {
            const submenu = document.getElementById(menuName + "-submenu");
            const icon = document.getElementById(menuName + "-icon");

            submenu.classList.toggle("hidden");
            icon.classList.toggle("rotate-90");
        }

        // Back to top functionality
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Show/hide back to top button based on scroll position
    window.addEventListener('scroll', function() {
        const backToTopBtn = document.getElementById('back-to-top');
        const header = document.querySelector('header'); // Select the header element

        if (header) {
            const headerHeight = header.offsetHeight;

            if (window.scrollY > headerHeight) {
                backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                backToTopBtn.classList.add('opacity-100');
            } else {
                backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
                backToTopBtn.classList.remove('opacity-100');
            }
        }
    });
    </script>
</head>

<body class="bg-gray-50 font-inter">
    <!-- Header -->
     @include('user.layouts.header')

    <!-- Hero Section -->
     @yield('content')
    <!-- Back to Top Button -->
    <button id="back-to-top" onclick="scrollToTop()"
        class="fixed bottom-6 right-6 z-50 bg-kemenag-gold hover:bg-yellow-400 text-white w-12 h-12 md:w-14 md:h-14 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 cursor-pointer pointer-events-none"
        title="Kembali ke atas">
        <i class="fas fa-chevron-up text-lg md:text-xl"></i>
    </button>
    <!-- Footer -->
     @include('user.layouts.footer')
</body>

</html>
