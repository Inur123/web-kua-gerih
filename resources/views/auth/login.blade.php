<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KUA Kecamatan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo-kua.png') }}" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .notification-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            max-width: 400px;
            width: 100%;
        }

        .notification {
            position: relative;
            padding: 16px;
            padding-right: 40px;
            /* Space for close button */
            margin-bottom: 12px;
            border-radius: 6px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start;
        }

        .notification-close {
            position: absolute;
            top: 12px;
            right: 12px;
            background: none;
            border: none;
            cursor: pointer;
            color: inherit;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .notification-close:hover {
            opacity: 1;
        }

        .notification-icon {
            margin-right: 12px;
            font-size: 18px;
            margin-top: 2px;
        }

        @media (max-width: 640px) {
            .notification-container {
                max-width: calc(100% - 40px);
                left: 20px;
                right: 20px;
            }
        }
    </style>
</head>

<body class="bg-gray-50 font-inter min-h-screen">
    <!-- Notification Container (Top Right) -->
    <div class="notification-container space-y-3">
        @if ($errors->any())
            <div class="notification bg-red-50 text-red-700 border-l-4 border-red-500">
                <i class="notification-icon fas fa-exclamation-circle"></i>
                <div>
                    <p class="font-medium">Terjadi kesalahan!</p>
                    <ul class="mt-1 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button class="notification-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if (session('success'))
            <div class="notification bg-green-50 text-green-700 border-l-4 border-green-500">
                <i class="notification-icon fas fa-check-circle"></i>
                <div>
                    <p class="font-medium">Sukses!</p>
                    <p class="mt-1 text-sm">{{ session('success') }}</p>
                </div>
                <button class="notification-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    </div>


    <!-- Login Section -->
    <main class="py-8 md:py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-kemenag-green to-kemenag-light-green text-white p-6 text-center">
                        <div
                            class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold mb-2">Masuk ke Akun</h2>
                        <p class="text-white text-opacity-90 text-sm">Silakan masuk untuk mengakses layanan KUA</p>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <!-- Email/Username Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-envelope mr-2 text-kemenag-green"></i>
                                    Email
                                </label>
                                <input type="text" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('email') border-red-500 @enderror"
                                    placeholder="Masukkan email">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-lock mr-2 text-kemenag-green"></i>
                                    Password
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required
                                        class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('password') border-red-500 @enderror"
                                        placeholder="Masukkan password">
                                    <button type="button" onclick="togglePassword()"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-kemenag-green transition-colors">
                                        <i id="toggle-icon" class="fas fa-eye cursor-pointer"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Login Button -->
                            <button type="submit"
                                class="w-full bg-kemenag-green text-white py-3 px-6 rounded-lg font-semibold hover:bg-kemenag-light-green transition-colors focus:ring-2 focus:ring-kemenag-green focus:ring-offset-2 cursor-pointer">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Masuk
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
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
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggle-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
