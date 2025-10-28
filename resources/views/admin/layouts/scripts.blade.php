<script>
      // Deteksi klik kanan
        // document.addEventListener('contextmenu', function(e) {
        //     e.preventDefault();

        //     // Cek apakah sudah ada notifikasi klik kanan
        //     if (!document.querySelector('.notification.right-click-warning')) {
        //         const container = document.querySelector('.notification-container');

        //         const notif = document.createElement('div');
        //         notif.className = 'notification right-click-warning bg-yellow-50 text-yellow-700 border-l-4 border-yellow-500';
        //         notif.innerHTML = `
        //             <i class="notification-icon fas fa-ban"></i>
        //             <div>
        //                 <p class="font-medium">Aksi Diblokir</p>
        //                 <p class="mt-1 text-sm">Klik kanan dinonaktifkan di halaman ini.</p>
        //             </div>
        //             <button class="notification-close"><i class="fas fa-times"></i></button>
        //         `;

        //         container.appendChild(notif);

        //         // Event untuk tombol close
        //         notif.querySelector('.notification-close').addEventListener('click', () => notif.remove());

        //         // Auto-close
        //         setTimeout(() => {
        //             notif.style.transition = 'opacity 0.5s ease';
        //             notif.style.opacity = '0';
        //             setTimeout(() => notif.remove(), 500);
        //         }, 3000);
        //     }
        // });
    // Sidebar mobile toggle
    const sidebarToggleBtn = document.getElementById("sidebarToggleBtn");
    const sidebarMobile = document.getElementById("sidebarMobile");
    const sidebarMobileOverlay = document.getElementById(
        "sidebarMobileOverlay"
    );
    const closeSidebarBtn = document.getElementById("closeSidebarBtn");

    function openSidebar() {
        sidebarMobile.classList.remove("-translate-x-full");
        sidebarMobileOverlay.classList.remove("hidden");
    }

    function closeSidebar() {
        sidebarMobile.classList.add("-translate-x-full");
        sidebarMobileOverlay.classList.add("hidden");
    }

    sidebarToggleBtn.addEventListener("click", openSidebar);
    closeSidebarBtn.addEventListener("click", closeSidebar);
    sidebarMobileOverlay.addEventListener("click", closeSidebar);

    // Optional: close sidebar with ESC key
    document.addEventListener("keydown", function(e) {
        if (e.key === "Escape") closeSidebar();
    });

    // Profile dropdown with chevron rotation
    const profileBtn = document.getElementById("profileBtn");
    const profileDropdown = document.getElementById("profileDropdown");
    const chevronIcon = profileBtn.querySelector(".fa-chevron-down");
    let profileOpen = false;

    profileBtn.addEventListener("click", function(e) {
        e.stopPropagation();
        profileOpen = !profileOpen;

        // Toggle dropdown visibility with animation
        if (profileOpen) {
            profileDropdown.classList.remove("hidden");
            profileDropdown.classList.add("animate-fadeIn");
            profileDropdown.classList.remove("animate-fadeOut");
            chevronIcon.classList.remove("fa-chevron-down");
            chevronIcon.classList.add("fa-chevron-up");
        } else {
            profileDropdown.classList.add("animate-fadeOut");
            profileDropdown.classList.remove("animate-fadeIn");
            chevronIcon.classList.remove("fa-chevron-up");
            chevronIcon.classList.add("fa-chevron-down");
            setTimeout(() => {
                profileDropdown.classList.add("hidden");
            }, 200);
        }
    });
     // Dropdown functionality for sidebar menus
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile sidebar toggle
        const sidebarToggleBtn = document.getElementById("sidebarToggleBtn");
        const sidebarMobile = document.getElementById("sidebarMobile");
        const sidebarMobileOverlay = document.getElementById("sidebarMobileOverlay");
        const closeSidebarBtn = document.getElementById("closeSidebarBtn");

        if (sidebarToggleBtn && sidebarMobile && sidebarMobileOverlay && closeSidebarBtn) {
            function openSidebar() {
                sidebarMobile.classList.remove("-translate-x-full");
                sidebarMobileOverlay.classList.remove("hidden");
            }

            function closeSidebar() {
                sidebarMobile.classList.add("-translate-x-full");
                sidebarMobileOverlay.classList.add("hidden");
            }

            sidebarToggleBtn.addEventListener("click", openSidebar);
            closeSidebarBtn.addEventListener("click", closeSidebar);
            sidebarMobileOverlay.addEventListener("click", closeSidebar);

            // Close sidebar with ESC key
            document.addEventListener("keydown", function(e) {
                if (e.key === "Escape") closeSidebar();
            });
        }

        // Sidebar dropdown functionality
        document.querySelectorAll('.dropdown-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const dropdownGroup = this.closest('.dropdown-group');
                const dropdownContent = dropdownGroup.querySelector('.dropdown-content');
                const chevron = this.querySelector('.fa-chevron-down');

                // Toggle the dropdown content
                dropdownContent.classList.toggle('hidden');

                // Rotate the chevron icon
                chevron.classList.toggle('rotate-180');

                // Close other open dropdowns
                document.querySelectorAll('.dropdown-group').forEach(group => {
                    if (group !== dropdownGroup) {
                        group.querySelector('.dropdown-content').classList.add('hidden');
                        group.querySelector('.fa-chevron-down').classList.remove('rotate-180');
                    }
                });
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown-group')) {
                document.querySelectorAll('.dropdown-content').forEach(content => {
                    content.classList.add('hidden');
                });
                document.querySelectorAll('.dropdown-btn .fa-chevron-down').forEach(chevron => {
                    chevron.classList.remove('rotate-180');
                });
            }
        });

        // Auto-open dropdown if child is active (for Laravel route highlighting)
        document.querySelectorAll('.dropdown-content a').forEach(link => {
            if (link.classList.contains('bg-kemenag-light-green')) {
                const dropdownGroup = link.closest('.dropdown-group');
                dropdownGroup.querySelector('.dropdown-content').classList.remove('hidden');
                dropdownGroup.querySelector('.fa-chevron-down').classList.add('rotate-180');
            }
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function(e) {
        if (profileOpen && !profileBtn.contains(e.target)) {
            profileDropdown.classList.add("animate-fadeOut");
            profileDropdown.classList.remove("animate-fadeIn");
            chevronIcon.classList.remove("fa-chevron-up");
            chevronIcon.classList.add("fa-chevron-down");
            setTimeout(() => {
                profileDropdown.classList.add("hidden");
                profileOpen = false;
            }, 200);
        }
    });

     // Notification close functionality (manual and auto-close after 3 seconds)
        document.querySelectorAll('.notification').forEach(notification => {
            // Manual close
            const closeButton = notification.querySelector('.notification-close');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    notification.remove();
                });
            }

            // Auto-close after 3 seconds
            setTimeout(() => {
                notification.style.transition = 'opacity 0.5s ease';
                notification.style.opacity = '0';

                // Remove the element after the fade out completes
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }, 3000);
        });
</script>
