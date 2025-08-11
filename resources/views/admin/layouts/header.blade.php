 <header class="sticky top-0 z-20 bg-white shadow flex items-center justify-between px-4 md:px-8 py-4">
     <!-- Hamburger for mobile -->
     <button id="sidebarToggleBtn" class="md:hidden text-black p-2 focus:outline-none mr-2">
         <i class="fas fa-bars"></i>
     </button>
     <h1 class="text-xl md:text-2xl font-bold text-kemenag-green">
         Dashboard
     </h1>
     <div class="flex items-center space-x-2 md:space-x-4 relative">
         <!-- Profile Dropdown -->
         <div id="profileBtn" class="flex items-center space-x-2 cursor-pointer select-none relative">
             <div class="bg-kemenag-gold text-white p-2 rounded-full">
                 <i class="fas fa-user"></i>
             </div>
             <span class="font-medium hidden sm:inline">
                 {{ Auth::user()->name }}
             </span>
             <i class="fas fa-chevron-down text-xs text-gray-600 transition-transform duration-200"></i>
             <!-- Dropdown -->
             <div id="profileDropdown"
                 class="absolute right-0 top-full mt-1 w-40 bg-white rounded-lg shadow-lg border border-gray-100 py-2 z-50 hidden">
                 <div class="flex flex-col">
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <button type="submit"
                             class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                             <i class="fas fa-sign-out-alt mr-2"></i> Logout
                         </button>
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </header>
