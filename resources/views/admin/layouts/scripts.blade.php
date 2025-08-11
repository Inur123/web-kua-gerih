<script>
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
</script>
