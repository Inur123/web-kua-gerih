  <footer class="bg-kemenag-green text-white py-8 md:py-12">
      <div class="container mx-auto px-4">
          <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
              <div>
                  <div class="flex items-center mb-3">
                      <img src="{{ asset('images/logo-kua.png') }}" alt="Logo KUA Gerih Ngawi" class="h-12 mr-3">
                      <h4 class="font-semibold text-lg">KUA Kecamatan<br>Gerih Ngawi</h4>
                  </div>
                  <p class="text-sm text-gray-300">
                      Melayani masyarakat dalam urusan administrasi keagamaan dengan
                      profesional dan amanah.
                  </p>
              </div>
              <div>
                  <h4 class="font-semibold mb-4">Menu</h4>
                  <ul class="text-sm space-y-2 text-gray-300">
                      <li>
                          <a href="{{ route('layanan.index') }}"
                              class="hover:text-white transition-colors @if (request()->routeIs('layanan.*')) text-white @endif">
                              Layanan
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('regulasi.index') }}"
                              class="hover:text-white transition-colors @if (request()->routeIs('regulasi.*')) text-white @endif">
                              Regulasi
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('berita.index') }}"
                              class="hover:text-white transition-colors @if (request()->routeIs('berita.*')) text-white @endif">
                              Berita
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('survey.index') }}"
                              class="hover:text-white transition-colors @if (request()->routeIs('survey.*')) text-white @endif">
                              Survei Kepuasan
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('kontak.index') }}"
                              class="hover:text-white transition-colors @if (request()->routeIs('kontak.index')) text-white @endif">
                              Kontak
                          </a>
                      </li>
                  </ul>
              </div>

              <div>
                  <h4 class="font-semibold mb-4">Informasi</h4>
                  <ul class="text-sm space-y-2 text-gray-300">
                      <li>
                          <a href="#" class="hover:text-white transition-colors">Persyaratan</a>
                      </li>
                      <li>
                          <a href="#" class="hover:text-white transition-colors">Biaya</a>
                      </li>
                      <li>
                          <a href="#" class="hover:text-white transition-colors">Jadwal Pelayanan</a>
                      </li>
                      <li>
                          <a href="#" class="hover:text-white transition-colors">FAQ</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h4 class="font-semibold mb-4">Media Sosial</h4>
                  <div class="flex space-x-4">
                      <a href="https://www.facebook.com/profile.php?id=100011577668728" target="_blank"
                          rel="noopener noreferrer" class="text-gray-300 hover:text-white transition-colors">
                          <i class="fab fa-facebook text-xl"></i>
                      </a>

                      <a href="https://www.instagram.com/kuagerih?igsh=amJ0NjBvbGpvOGZq" target="_blank"
                          rel="noopener noreferrer" class="text-gray-300 hover:text-white transition-colors">
                          <i class="fab fa-instagram text-xl"></i>
                      </a>
                      <a href="#" class="text-gray-300 hover:text-white transition-colors" target="_blank"
                          rel="noopener noreferrer">
                          <i class="fab fa-twitter text-xl"></i>
                      </a>
                      <a href="https://youtube.com/@kuagerih3423?si=ualdIEHzY4-6Om87"
                          class="text-gray-300 hover:text-white transition-colors" target="_blank"
                          rel="noopener noreferrer">
                          <i class="fab fa-youtube text-xl"></i>
                      </a>
                      <!-- TikTok -->
                      <a href="https://www.tiktok.com/@kua.gerih?_t=ZS-90VrAiYRkMp&_r=1" target="_blank"
                          rel="noopener noreferrer" class="text-gray-300 hover:text-white transition-colors">
                          <i class="fab fa-tiktok text-xl"></i>
                      </a>
                  </div>

                  <!-- Total Views -->
                  <div class="mt-6 text-sm text-gray-300">
                      <i class="fas fa-eye mr-1"></i> Total Pengunjung Website: <span
                          class="font-semibold">{{ $totalViews ?? 0 }}</span>
                  </div>
              </div>


          </div>

          <div class="border-t border-gray-600 mt-8 pt-8 text-center text-sm text-gray-300">
              <p>
                  &copy; {{ date('Y') }} KUA Kecamatan Gerih - Kementerian Agama Republik Indonesia.
                  Semua hak dilindungi.
              </p>
          </div>
      </div>
  </footer>
