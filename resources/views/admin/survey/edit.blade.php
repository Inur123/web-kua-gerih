@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm mb-8">
    <h3 class="font-semibold text-kemenag-green text-2xl mb-6">Edit Survey Kepuasan</h3>
    <form action="{{ route('admin.survey.update', $survey->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $survey->name) }}"
                class="w-full px-4 py-2 focus:outline-none border rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $survey->email) }}"
                class="w-full px-4 py-2 focus:outline-none border rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
            <div id="emoji-rating" class="flex gap-4 text-3xl mt-2">
                @php
                    $emojis = [1 => '😡', 2 => '😞', 3 => '😐', 4 => '😊', 5 => '😍'];
                    $selected = old('rating', $survey->rating);
                @endphp
                @foreach($emojis as $val => $emoji)
                    <span class="emoji-item cursor-pointer transition {{ $selected == $val ? 'scale-125 filter-none' : 'filter grayscale' }}"
                          data-value="{{ $val }}">{{ $emoji }}</span>
                @endforeach
                <input type="hidden" name="rating" id="ratingInput" value="{{ $selected }}">
            </div>
            @error('rating')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Feedback</label>
            <textarea name="feedback" rows="4"
                class="w-full px-4 py-2 focus:outline-none border rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent">{{ old('feedback', $survey->feedback) }}</textarea>
            @error('feedback')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-2 mt-8">
            <a href="{{ route('admin.survey.index') }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">Batal</a>
            <button type="submit" class="px-6 py-2 rounded-lg bg-kemenag-green text-white font-semibold hover:bg-kemenag-light-green transition cursor-pointer">Simpan</button>
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('.emoji-item').forEach(function(item) {
        item.addEventListener('click', function() {
            document.getElementById('ratingInput').value = this.dataset.value;
            document.querySelectorAll('.emoji-item').forEach(function(e) {
                e.classList.remove('scale-125', 'filter-none');
                e.classList.add('filter', 'grayscale');
            });
            this.classList.add('scale-125', 'filter-none');
            this.classList.remove('filter', 'grayscale');
        });
    });
</script>
@endsection
