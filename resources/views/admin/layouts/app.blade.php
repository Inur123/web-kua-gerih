<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard KUA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo-kua.png') }}" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <style>
        .sidebar-overlay::-webkit-scrollbar {
            display: none;
        }

        .sidebar-overlay {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-10px);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.2s ease-out forwards;
        }

        .animate-fadeOut {
            animation: fadeOut 0.2s ease-out forwards;
        }

        /* Notifikasi */
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

<body class="bg-gray-50">
    <div class="flex h-screen">
        @include('admin.layouts.sidebar')
        <div class="flex-1 flex flex-col md:ml-64">
            @include('admin.layouts.header')

            <!-- Notifikasi -->
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

            <main class="flex-1 overflow-y-auto p-2 sm:p-4 md:p-8mt-2">
                @yield('content')
            </main>

            @include('admin.layouts.footer')
        </div>
    </div>

    @include('admin.layouts.scripts')

</body>

</html>
