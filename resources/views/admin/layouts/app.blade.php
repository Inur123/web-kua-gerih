<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard KUA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "kemenag-green": "#2D5016",
                        "kemenag-light-green": "#4A7C59",
                        "kemenag-gold": "#D4AF37",
                    },
                },
            },
        };
    </script>
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
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        @include('admin.layouts.sidebar')
        <div class="flex-1 flex flex-col md:ml-64">
            @include('admin.layouts.header')
            <main class="flex-1 overflow-y-auto p-2 sm:p-4 md:p-8 bg-white rounded-t-2xl shadow-inner mt-2">
                @yield('content')
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>
    @include('admin.layouts.scripts')
</body>

</html>
