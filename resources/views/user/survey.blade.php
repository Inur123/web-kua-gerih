@extends('user.layouts.app')
@section('title', 'Kepuasan Layanan - Kua Gerih')
@section('content')
<style>
.rating-emojis input[type="radio"] {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

.rating-emojis label {
    font-size: 2.5rem;
    cursor: pointer;
    transition: transform 0.2s;
    filter: grayscale(1);
}

.rating-emojis input[type="radio"]:checked + label {
    filter: none;
    transform: scale(1.15);
}

.rating-emojis label:hover {
    filter: none;
    transform: scale(1.15);
}

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

<section id="survey-form" class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4">
        <h3 class="text-2xl md:text-3xl font-bold text-center text-kemenag-green mb-8 md:mb-12">
            Survey Kepuasan Layanan
        </h3>

        <div class="bg-gray-50 p-6 md:p-8 rounded-xl shadow-sm max-w-3xl mx-auto">
            <form id="satisfaction-form" action="{{ route('survey.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="name">
                        Nama *
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-kemenag-green" required placeholder="Nama Anda">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="email">
                        Email (opsional)
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-kemenag-green" placeholder="Email Anda">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2">
                        Tingkat Kepuasan *
                    </label>
                    <div class="rating-emojis flex justify-center space-x-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="emoji{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                            @php
                                $titles = ['Sangat Tidak Puas', 'Tidak Puas', 'Biasa Saja', 'Puas', 'Sangat Puas'];
                                $emojis = ['😡','😞','😐','😊','😍'];
                            @endphp
                            <label for="emoji{{ $i }}" title="{{ $titles[$i-1] }}">{{ $emojis[$i-1] }}</label>
                        @endfor
                    </div>
                    <div class="flex justify-between text-xs text-gray-500 mt-2">
                        <span>Sangat Tidak Puas</span>
                        <span>Sangat Puas</span>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="feedback">
                        Masukan dan Saran (opsional)
                    </label>
                    <textarea id="feedback" name="feedback" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-kemenag-green" placeholder="Berikan masukan dan saran untuk meningkatkan kualitas layanan kami...">{{ old('feedback') }}</textarea>
                    @error('feedback')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 flex">
                    <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-kemenag-green text-white px-6 py-3 rounded-lg font-semibold hover:bg-kemenag-light-green transition-colors">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Penilaian
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
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

        setTimeout(() => {
            notification.remove();
        }, 500);
    }, 3000);
});
</script>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
@endsection
