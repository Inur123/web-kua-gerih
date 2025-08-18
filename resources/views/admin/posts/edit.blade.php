@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-sm mb-8">
        <h3 class="font-semibold text-kemenag-green mb-6 text-lg">Edit Berita</h3>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kiri --}}
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('title') border-red-500 @enderror"
                            placeholder="Masukkan judul berita">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('status') border-red-500 @enderror">
                            <option value="">Pilih Status</option>
                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft
                            </option>
                            <option value="active" {{ old('status', $post->status) == 'active' ? 'selected' : '' }}>Publish
                            </option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="category_id" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('category_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Publikasi</label>
                        <input type="date" name="published_at"
                            value="{{ old('published_at', $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d') : '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('published_at') border-red-500 @enderror">
                        @error('published_at')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Isi Berita</label>
                        <textarea id="content" name="content" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('content') border-red-500 @enderror"
                            placeholder="Masukkan isi berita">{{ old('content', $post->content ?? '') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- Kanan --}}
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tags (pisahkan dengan koma)</label>
                        <input type="text" name="tags"
                            value="{{ old('tags', $post->tags->pluck('name')->join(', ')) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('tags') border-red-500 @enderror"
                            placeholder="Contoh: magetan, ponorog">
                        @error('tags')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Thumbnail</label>
                        @if ($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" class="h-16 mb-2"
                                id="thumbnail-preview-old">
                        @endif
                        <input type="file" name="thumbnail" accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors @error('thumbnail') border-red-500 @enderror"
                            onchange="previewThumbnail(event)">
                        <img id="thumbnail-preview" class="mt-2 h-24 rounded shadow hidden" alt="Preview Thumbnail">
                        @error('thumbnail')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gambar Lain (bisa tambah/hapus)</label>
                        <div class="flex flex-wrap gap-2 mt-2" id="existing-images">
                            @foreach ($post->images as $img)
                                <div class="relative group" data-image-id="{{ $img->id }}">
                                    <img src="{{ asset('storage/' . $img->image) }}" alt="Gambar" class="h-16 rounded">
                                    <input type="hidden" name="existing_images[]" value="{{ $img->id }}">
                                    <button type="button" onclick="removeExistingImage(this)"
                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        ×
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div id="image-input-group">
                            @if (!$post->images->isEmpty())
                                <!-- Show input field only if there are existing images -->
                                <div class="flex items-center mb-2">
                                    <input type="file" name="images[]" accept="image/*"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors"
                                        onchange="previewImage(this)">
                                    <div class="flex ml-2">
                                        <button type="button" onclick="addImageInput()"
                                            class="px-3 py-2 bg-kemenag-green text-white rounded-lg hover:bg-green-700 transition-colors">+</button>
                                        <button type="button" onclick="removeImageInput(this)"
                                            class="ml-1 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 transition-colors">-</button>
                                    </div>
                                </div>
                            @else
                                <!-- Show add button only if no existing images -->
                                <button type="button" onclick="addImageInput()"
                                    class="px-3 py-2 bg-kemenag-green text-white rounded-lg hover:bg-green-700 transition-colors">
                                    + Tambah Gambar Baru
                                </button>
                            @endif
                        </div>

                        <div id="images-preview" class="flex flex-wrap gap-2 mt-2"></div>
                        <input type="hidden" name="deleted_images" id="deleted-images-input" value="">
                        @error('images.*')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-2">
                <a href="{{ route('posts.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Batal</a>
                <button type="submit"
                    class="bg-kemenag-green text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">Update</button>
            </div>
        </form>
    </div>
    <script>
        function previewThumbnail(event) {
            const input = event.target;
            const preview = document.getElementById('thumbnail-preview');
            const oldPreview = document.getElementById('thumbnail-preview-old');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (oldPreview) oldPreview.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
                if (oldPreview) oldPreview.classList.remove('hidden');
            }
        }

        function previewImage(input) {
            const imagesPreview = document.getElementById('images-preview');
            // Remove previous preview for this input
            if (input._previewEl) {
                input._previewEl.remove();
            }
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'h-16 rounded shadow';
                    imagesPreview.appendChild(img);
                    input._previewEl = img;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function addImageInput() {
            const group = document.getElementById('image-input-group');

            // Replace "Tambah Gambar Baru" button with input field if it exists
            if (group.innerHTML.includes('Tambah Gambar Baru')) {
                group.innerHTML = `
            <div class="flex items-center mb-2">
                <input type="file" name="images[]" accept="image/*"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors"
                    onchange="previewImage(this)">
                <div class="flex ml-2">
                    <button type="button" onclick="addImageInput()" class="px-3 py-2 bg-kemenag-green text-white rounded-lg hover:bg-green-700 transition-colors">+</button>
                    <button type="button" onclick="removeImageInput(this)" class="ml-1 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 transition-colors">-</button>
                </div>
            </div>
        `;
            } else {
                // Add new input field
                const div = document.createElement('div');
                div.className = 'flex items-center mb-2';
                div.innerHTML = `
            <input type="file" name="images[]" accept="image/*"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kemenag-green focus:border-transparent transition-colors"
                onchange="previewImage(this)">
            <div class="flex ml-2">
                <button type="button" onclick="addImageInput()" class="px-3 py-2 bg-kemenag-green text-white rounded-lg hover:bg-green-700 transition-colors">+</button>
                <button type="button" onclick="removeImageInput(this)" class="ml-1 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 transition-colors">-</button>
            </div>
        `;
                group.appendChild(div);
            }
        }

        function removeImageInput(btn) {
            // Remove preview if exists
            const input = btn.closest('.flex.items-center').querySelector('input[type=file]');
            if (input && input._previewEl) {
                input._previewEl.remove();
            }

            // Remove the input group
            btn.closest('.flex.items-center').remove();

            // If no inputs left and no existing images, show add button only
            const inputGroups = document.querySelectorAll('#image-input-group > div');
            const existingImages = document.querySelectorAll('#existing-images > div');
            if (inputGroups.length === 0 && existingImages.length === 0) {
                const group = document.getElementById('image-input-group');
                group.innerHTML = `
            <button type="button" onclick="addImageInput()" class="px-3 py-2 bg-kemenag-green text-white rounded-lg hover:bg-green-700 transition-colors">
                + Tambah Gambar Baru
            </button>
        `;
            }
        }

        function removeExistingImage(btn) {
            const container = btn.closest('.relative');
            const imageId = container.getAttribute('data-image-id');

            // Add to deleted images list
            const deletedInput = document.getElementById('deleted-images-input');
            const deletedImages = deletedInput.value ? deletedInput.value.split(',') : [];
            deletedImages.push(imageId);
            deletedInput.value = deletedImages.join(',');

            // Remove the image container
            container.remove();
        }
    </script>
    <script src="https://cdn.tiny.cloud/1/mimr482vltcpcta1nd94dwlkgbsdgmcyz4n3tve4ydvf4l83/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content', // target textarea
            menubar: true, // menubar atas
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help emoticons',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            height: 400,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            image_advtab: true,
            importcss_append: true,
            content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }"
        });
    </script>
@endsection
