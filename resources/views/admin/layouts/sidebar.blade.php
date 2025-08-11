  <!-- Sidebar Desktop -->
  <aside id="sidebar"
      class="bg-kemenag-green text-white w-64 h-full fixed top-0 left-0 z-30 flex-col hidden md:flex transition-all duration-300">
      <div class="flex items-center space-x-3 mb-8 p-4 mt-2">
          <div class="bg-kemenag-gold text-kemenag-green p-2 rounded-lg">
              <i class="fas fa-mosque text-xl"></i>
          </div>
          <h1 class="font-bold text-lg">Dashboard KUA</h1>
      </div>
      <nav class="px-2 flex-1 overflow-y-auto">
          <div class="space-y-1">
              <a href="#" class="flex items-center space-x-3 bg-kemenag-light-green p-3 rounded-lg">
                  <i class="fas fa-tachometer-alt w-5"></i>
                  <span>Dashboard</span>
              </a>
              <div class="mt-4">
                  <p class="text-xs uppercase text-gray-300 px-3 mb-2">
                      Menu Utama
                  </p>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-users w-5"></i>
                      <span>Data Penduduk</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-ring w-5"></i>
                      <span>Pernikahan</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-handshake w-5"></i>
                      <span>Rujuk</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-mosque w-5"></i>
                      <span>Wakaf</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-kaaba w-5"></i>
                      <span>Haji & Umrah</span>
                  </a>
              </div>
              <div class="mt-4">
                  <p class="text-xs uppercase text-gray-300 px-3 mb-2">Laporan</p>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-chart-bar w-5"></i>
                      <span>Statistik</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-file-alt w-5"></i>
                      <span>Laporan Bulanan</span>
                  </a>
              </div>
              <div class="mt-4">
                  <p class="text-xs uppercase text-gray-300 px-3 mb-2">
                      Pengaturan
                  </p>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-user-cog w-5"></i>
                      <span>Pengguna</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-cog w-5"></i>
                      <span>Pengaturan Sistem</span>
                  </a>
              </div>
          </div>
      </nav>
  </aside>
  <!-- Sidebar Mobile Overlay -->
  <div id="sidebarMobileOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden md:hidden"></div>
  <!-- Sidebar Mobile -->
  <div id="sidebarMobile"
      class="sidebar-overlay fixed top-0 left-0 h-full w-64 bg-kemenag-green text-white z-40 transform -translate-x-full transition-transform duration-300 flex flex-col md:hidden">
      <div class="flex items-center justify-between p-4 mt-2 mb-4">
          <div class="flex items-center space-x-3">
              <div class="bg-kemenag-gold text-kemenag-green p-2 rounded-lg">
                  <i class="fas fa-mosque text-xl"></i>
              </div>
              <h1 class="font-bold text-lg">Dashboard KUA</h1>
          </div>
          <button id="closeSidebarBtn" class="text-white text-2xl focus:outline-none">
              <i class="fas fa-times"></i>
          </button>
      </div>
      <nav class="px-2 flex-1 overflow-y-auto">
          <div class="space-y-1">
              <a href="#" class="flex items-center space-x-3 bg-kemenag-light-green p-3 rounded-lg">
                  <i class="fas fa-tachometer-alt w-5"></i>
                  <span>Dashboard</span>
              </a>
              <div class="mt-4">
                  <p class="text-xs uppercase text-gray-300 px-3 mb-2">
                      Menu Utama
                  </p>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-users w-5"></i>
                      <span>Data Penduduk</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-ring w-5"></i>
                      <span>Pernikahan</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-handshake w-5"></i>
                      <span>Rujuk</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-mosque w-5"></i>
                      <span>Wakaf</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-kaaba w-5"></i>
                      <span>Haji & Umrah</span>
                  </a>
              </div>
              <div class="mt-4">
                  <p class="text-xs uppercase text-gray-300 px-3 mb-2">Laporan</p>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-chart-bar w-5"></i>
                      <span>Statistik</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-file-alt w-5"></i>
                      <span>Laporan Bulanan</span>
                  </a>
              </div>
              <div class="mt-4">
                  <p class="text-xs uppercase text-gray-300 px-3 mb-2">
                      Pengaturan
                  </p>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-user-cog w-5"></i>
                      <span>Pengguna</span>
                  </a>
                  <a href="#" class="flex items-center space-x-3 hover:bg-kemenag-light-green p-3 rounded-lg">
                      <i class="fas fa-cog w-5"></i>
                      <span>Pengaturan Sistem</span>
                  </a>
              </div>
          </div>
      </nav>
  </div>
