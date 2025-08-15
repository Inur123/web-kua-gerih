<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KUA Kecamatan Gerih - Kantor Urusan Agama</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo-kua.png') }}" type="image/x-icon" />
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
