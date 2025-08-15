<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error | KUA Kecamatan</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo-kua.png') }}" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-inter min-h-screen flex flex-col">
    <!-- Error Content -->
    <main class="flex-1 flex items-center justify-center py-12 px-4">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Error Illustration -->
            <div class="mb-8">
                <div class="w-32 h-32 md:w-48 md:h-48 mx-auto bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-exclamation-triangle text-white text-4xl md:text-6xl"></i>
                </div>
                <div class="text-6xl md:text-8xl font-bold text-orange-600 mb-4">500</div>
            </div>

            <!-- Error Message -->
            <div class="mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-kemenag-green mb-4">
                    Terjadi Kesalahan Server
                </h2>
                <p class="text-gray-600 text-base md:text-lg mb-6">
                    Maaf, terjadi kesalahan pada server kami. Tim teknis sedang bekerja untuk memperbaiki masalah ini. Silakan coba lagi dalam beberapa saat.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <button onclick="location.reload()" class="bg-kemenag-green text-white px-6 py-3 rounded-lg font-semibold hover:bg-kemenag-light-green transition-colors inline-flex items-center justify-center cursor-pointer">
                    <i class="fas fa-refresh mr-2"></i>
                    Muat Ulang
                </button>
            </div>
        </div>
    </main>
</body>
</html>
