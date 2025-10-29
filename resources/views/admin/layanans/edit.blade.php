@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-8">
        <h3 class="font-semibold text-kemenag-green text-xl sm:text-2xl mb-4">Edit Layanan</h3>

        <form action="{{ route('layanans.update', $layanan) }}" method="POST" id="layananForm" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
                <input type="text" name="nama" id="nama" required value="{{ old('nama', $layanan->nama) }}"
                    class="w-full px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="active"
                            {{ old('status', $layanan->status) == 'active' ? 'checked' : '' }}
                            class="accent-kemenag-green focus:ring-kemenag-green">
                        <span class="ml-2 text-black">Aktif</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="inactive"
                            {{ old('status', $layanan->status) == 'inactive' ? 'checked' : '' }}
                            class="accent-kemenag-green focus:ring-kemenag-green">
                        <span class="ml-2 text-red-500">Tidak Aktif</span>
                    </label>
                </div>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Icon (SVG)</label>
                <textarea id="icon-input" name="icon" rows="3"
                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:outline-none focus:ring-kemenag-green focus:border-transparent border-kemenag-green"
                    placeholder="Masukkan kode SVG disini">{{ old('icon', $layanan->icon) }}</textarea>
                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <p class="text-sm text-gray-500 mt-1">
                    Masukkan kode SVG dari <a href="https://heroicons.com/" target="_blank"
                        class="text-kemenag-green underline">Heroicons</a>.
                </p>

                <p class="text-sm text-gray-500 mt-1">Preview:</p>
                <div id="icon-preview"
                    class="mt-2 border border-kemenag-green rounded-md p-2 flex items-center justify-center"
                    style="width: 50px; height: 50px;">
                    {!! old('icon', $layanan->icon) !!}
                </div>
            </div>


            <div class="mt-6">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-semibold text-gray-700">Persyaratan</h4>
                    <button type="button" onclick="addPersyaratanField()"
                        class="text-sm text-kemenag-green hover:underline">
                        + Tambah Persyaratan
                    </button>
                </div>

                <div id="persyaratanContainer" class="space-y-4">
                    @foreach ($layanan->persyaratans as $key => $syarat)
                        <div class="persyaratan-item p-3 border rounded-lg">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                                <input type="text" name="existing_persyaratan[{{ $syarat->id }}][nama]"
                                    value="{{ $syarat->nama }}" placeholder="Nama"
                                    class="px-3 py-2 border border-kemenag-green rounded-md">
                                <textarea name="existing_persyaratan[{{ $syarat->id }}][deskripsi]"
                                    id="existing_persyaratan_deskripsi_{{ $syarat->id }}" placeholder="Deskripsi"
                                    class="px-3 py-2 border border-kemenag-green rounded-md">{{ $syarat->deskripsi }}</textarea>
                                <input type="url" name="existing_persyaratan[{{ $syarat->id }}][link_download]"
                                    value="{{ $syarat->link_download }}" placeholder="Link Download"
                                    class="px-3 py-2 border border-kemenag-green rounded-md">
                            </div>
                            <button type="button" onclick="removeItem(this,'delete_persyaratan',{{ $syarat->id }})"
                                class="text-sm text-red-600 hover:text-red-800">Hapus</button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-6">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-semibold text-gray-700">Syarat Khusus / Tambahan</h4>
                    <button type="button" onclick="addSyaratKhususField()"
                        class="text-sm text-kemenag-green hover:underline">
                        + Tambah Syarat Khusus
                    </button>
                </div>

                <div id="syaratKhususContainer" class="space-y-4">
                    @foreach ($layanan->syaratKhusus as $key => $khusus)
                        <div class="syarat-khusus-item p-3 border rounded-lg">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                                <input type="text" name="existing_syarat_khusus[{{ $khusus->id }}][nama]"
                                    value="{{ $khusus->nama }}" placeholder="Nama"
                                    class="px-3 py-2 border border-kemenag-green rounded-md">
                                <textarea name="existing_syarat_khusus[{{ $khusus->id }}][deskripsi]"
                                    id="existing_syarat_khusus_deskripsi_{{ $khusus->id }}" placeholder="Deskripsi"
                                    class="px-3 py-2 border border-kemenag-green rounded-md">{{ $khusus->deskripsi }}</textarea>
                                <input type="url" name="existing_syarat_khusus[{{ $khusus->id }}][link_download]"
                                    value="{{ $khusus->link_download }}" placeholder="Link Download"
                                    class="px-3 py-2 border border-kemenag-green rounded-md">
                            </div>
                            <button type="button" onclick="removeItem(this,'delete_syarat_khusus',{{ $khusus->id }})"
                                class="text-sm text-red-600 hover:text-red-800">Hapus</button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-6">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-semibold text-gray-700">Prosedur</h4>
                    <button type="button" onclick="addProsedurField()"
                        class="text-sm text-kemenag-green hover:underline">
                        + Tambah Prosedur
                    </button>
                </div>

                <div id="prosedurContainer" class="space-y-4">
                    @foreach ($layanan->prosedurs as $key => $step)
                        <div class="prosedur-item p-3 border rounded-lg">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                                <input type="text" name="existing_prosedur[{{ $step->id }}][nama]"
                                    value="{{ $step->nama }}" placeholder="Nama Prosedur"
                                    class="px-3 py-2 border border-kemenag-green rounded-md w-full">
                                <textarea name="existing_prosedur[{{ $step->id }}][deskripsi]"
                                    id="existing_prosedur_deskripsi_{{ $step->id }}" placeholder="Deskripsi"
                                    class="px-3 py-2 border border-kemenag-green rounded-md w-full">{{ $step->deskripsi }}</textarea>
                                <input type="text" name="existing_prosedur[{{ $step->id }}][link_download]"
                                    value="{{ $step->link_download }}" placeholder="Link Download (Opsional)"
                                    class="px-3 py-2 border border-kemenag-green rounded-md w-full">
                            </div>
                            <button type="button" onclick="removeItem(this,'delete_prosedur',{{ $step->id }})"
                                class="text-sm text-red-600 hover:text-red-800">Hapus</button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-2 mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-kemenag-green text-white rounded-md hover:bg-kemenag-light-green">
                    Simpan Perubahan
                </button>
                <a href="{{ route('layanans.index') }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.tiny.cloud/1/mimr482vltcpcta1nd94dwlkgbsdgmcyz4n3tve4ydvf4l83/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        let persyaratanCounter = 0;
        let syaratKhususCounter = 0;
        let prosedurCounter = 0;

        // === Inisialisasi TinyMCE global ===
        function initTiny(selector) {
            tinymce.init({
                selector: selector,
                height: 200,
                menubar: true,
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help emoticons',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media link anchor codesample | ltr rtl',
                setup: (editor) => {
                    editor.on('change', function() {
                        tinymce.triggerSave(); // supaya isi tersimpan ke textarea
                    });
                }
            });
        }


        // MODIFIED: Initialize TinyMCE for all existing textareas on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Main description


            // Existing Persyaratan descriptions
            @foreach ($layanan->persyaratans as $syarat)
                initTiny('#existing_persyaratan_deskripsi_{{ $syarat->id }}');
            @endforeach

            // Existing Syarat Khusus descriptions
            @foreach ($layanan->syaratKhusus as $khusus)
                initTiny('#existing_syarat_khusus_deskripsi_{{ $khusus->id }}');
            @endforeach

            // Existing Prosedur descriptions
            @foreach ($layanan->prosedurs as $step)
                initTiny('#existing_prosedur_deskripsi_{{ $step->id }}');
            @endforeach
        });


        function removeItem(button, deleteName, id = null) {
            const item = button.closest('div.border.rounded-lg'); // Target the parent container more specifically
            if (id) {
                // Before removing, check if it's a TinyMCE instance and destroy it
                const textarea = item.querySelector('textarea');
                if (textarea && tinymce.get(textarea.id)) {
                    tinymce.get(textarea.id).remove();
                }

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `${deleteName}[]`;
                input.value = id;
                document.getElementById('layananForm').appendChild(input);
            }
            item.remove();
        }


        // === Tambah Persyaratan ===
        function addPersyaratanField() {
            persyaratanCounter++;
            const container = document.getElementById('persyaratanContainer');
            const id = `persyaratan_deskripsi_${persyaratanCounter}`;

            container.insertAdjacentHTML('beforeend', `
            <div class="persyaratan-item p-3 border border-kemenag-green rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                    <input type="text" name="new_persyaratan[${persyaratanCounter}][nama]" placeholder="Nama"
                        class="px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent" required>
                    <textarea id="${id}" name="new_persyaratan[${persyaratanCounter}][deskripsi]"
                        placeholder="Deskripsi"></textarea>
                    <input type="url" name="new_persyaratan[${persyaratanCounter}][link_download]" placeholder="Link Download"
                        class="px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
                </div>
                <button type="button" onclick="removeItem(this)" class="text-sm text-red-600">Hapus</button>
            </div>
        `);
            initTiny(`#${id}`);
        }

        // === Tambah Syarat Khusus ===
        function addSyaratKhususField() {
            syaratKhususCounter++;
            const container = document.getElementById('syaratKhususContainer');
            const id = `syaratKhusus_deskripsi_${syaratKhususCounter}`;

            container.insertAdjacentHTML('beforeend', `
            <div class="syarat-khusus-item p-3 border border-kemenag-green rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                    <input type="text" name="new_syarat_khusus[${syaratKhususCounter}][nama]" placeholder="Nama"
                        class="px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent" required>
                    <textarea id="${id}" name="new_syarat_khusus[${syaratKhususCounter}][deskripsi]"
                        placeholder="Deskripsi"></textarea>
                    <input type="url" name="new_syarat_khusus[${syaratKhususCounter}][link_download]" placeholder="Link Download"
                        class="px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
                </div>
                <button type="button" onclick="removeItem(this)" class="text-sm text-red-600">Hapus</button>
            </div>
        `);
            initTiny(`#${id}`);
        }

        // === Tambah Prosedur ===
        function addProsedurField() {
            prosedurCounter++;
            const container = document.getElementById('prosedurContainer');
            const id = `prosedur_deskripsi_${prosedurCounter}`;

            container.insertAdjacentHTML('beforeend', `
            <div class="prosedur-item p-3 border border-kemenag-green rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                    <input type="text" name="new_prosedur[${prosedurCounter}][nama]"
                        placeholder="Nama Prosedur" class="px-3 py-2 border border-kemenag-green rounded-md w-full" required>
                    <textarea id="${id}" name="new_prosedur[${prosedurCounter}][deskripsi]"
                        placeholder="Deskripsi"></textarea>
                    <input type="text" name="new_prosedur[${prosedurCounter}][link_download]"
                        placeholder="Link Download (Opsional)" class="px-3 py-2 border border-kemenag-green rounded-md w-full">
                </div>
                <button type="button" onclick="removeItem(this)" class="text-sm text-red-600 hover:text-red-800">Hapus</button>
            </div>
        `);
            initTiny(`#${id}`);
        }
    </script>

    <script>
        const iconInput = document.getElementById('icon-input');
        const iconPreview = document.getElementById('icon-preview');

        iconInput.addEventListener('input', function() {
            iconPreview.innerHTML = this.value;
            const svg = iconPreview.querySelector('svg');
            if (svg) {
                svg.setAttribute('width', '40');
                svg.setAttribute('height', '40');
            }
        });

        // Set initial SVG size on load
        window.addEventListener('DOMContentLoaded', () => {
            const svg = iconPreview.querySelector('svg');
            if (svg) {
                svg.setAttribute('width', '40');
                svg.setAttribute('height', '40');
            }
        });
    </script>
@endsection
