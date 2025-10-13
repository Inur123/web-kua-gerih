@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-8">
    <h3 class="font-semibold text-kemenag-green text-xl sm:text-2xl mb-4">Edit Regulasi</h3>

    <form action="{{ route('regulasis.update', $regulasi) }}" method="POST" id="regulasiForm" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Judul Regulasi</label>
            <input type="text" name="nama" id="nama" required value="{{ old('nama', $regulasi->nama) }}"
                class="w-full px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
            @error('nama')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4"
                class="w-full px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">{{ old('deskripsi', $regulasi->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="active"
                        {{ old('status', $regulasi->status) == 'active' ? 'checked' : '' }}
                        class="accent-kemenag-green focus:ring-kemenag-green">
                    <span class="ml-2 text-black">Aktif</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="inactive"
                        {{ old('status', $regulasi->status) == 'inactive' ? 'checked' : '' }}
                        class="accent-kemenag-green focus:ring-kemenag-green">
                    <span class="ml-2 text-red-500">Tidak Aktif</span>
                </label>
            </div>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <div class="flex justify-between items-center mb-2">
                <h4 class="font-semibold text-gray-700">Lampiran</h4>
                <button type="button" onclick="addLampiranField()"
                    class="text-sm text-kemenag-green hover:underline cursor-pointer">+ Tambah Lampiran</button>
            </div>

            <div id="lampiranContainer" class="space-y-4">
                @foreach ($regulasi->lampirans as $lampiran)
                    <div class="lampiran-item p-3 border rounded-lg">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                            <input type="text" name="existing_lampiran[{{ $lampiran->id }}][nama]"
                                value="{{ $lampiran->nama }}" placeholder="Nama Lampiran" class="px-3 py-2 border border-kemenag-green focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent rounded-md">

                            <textarea name="existing_lampiran[{{ $lampiran->id }}][deskripsi]"
                                id="existing_lampiran_deskripsi_{{ $lampiran->id }}"
                                placeholder="Deskripsi">{{ $lampiran->deskripsi }}</textarea>

                            <input type="url" name="existing_lampiran[{{ $lampiran->id }}][link_download]"
                                value="{{ $lampiran->link_download }}" placeholder="Link Download"
                                class="px-3 py-2 border border-kemenag-green focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent rounded-md">
                        </div>
                        <button type="button" onclick="removeItem(this,'delete_lampiran',{{ $lampiran->id }})"
                            class="text-sm text-red-600 hover:text-red-800 cursor-pointer">Hapus</button>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex gap-2 mt-6">
            <button type="submit" class="px-4 py-2 bg-kemenag-green text-white rounded-md hover:bg-kemenag-light-green cursor-pointer">
                Simpan Perubahan
            </button>
            <a href="{{ route('regulasis.index') }}"
                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 text-center">
                Batal
            </a>
        </div>
    </form>
</div>

<script src="https://cdn.tiny.cloud/1/mimr482vltcpcta1nd94dwlkgbsdgmcyz4n3tve4ydvf4l83/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    let lampiranCounter = 0;

    // === Inisialisasi TinyMCE global ===
    function initTiny(selector) {
        tinymce.init({
            selector: selector,
            height: 200,
            menubar: false,
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help emoticons',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media link anchor codesample | ltr rtl',
            setup: (editor) => {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            }
        });
    }


    document.addEventListener('DOMContentLoaded', function() {
        // HANYA inisialisasi untuk deskripsi lampiran yang sudah ada
        @foreach ($regulasi->lampirans as $lampiran)
            initTiny('#existing_lampiran_deskripsi_{{ $lampiran->id }}');
        @endforeach
    });


    function removeItem(button, deleteName, id = null) {
        const item = button.closest('.lampiran-item');
        if (id) {
            const textarea = item.querySelector('textarea');
            if (textarea && tinymce.get(textarea.id)) {
                tinymce.get(textarea.id).remove();
            }

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = `${deleteName}[]`;
            input.value = id;
            document.getElementById('regulasiForm').appendChild(input);
        }
        item.remove();
    }


    function addLampiranField() {
        lampiranCounter++;
        const container = document.getElementById('lampiranContainer');
        const id = `new_lampiran_deskripsi_${lampiranCounter}`;

        container.insertAdjacentHTML('beforeend', `
            <div class="lampiran-item p-3 border rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                    <input type="text" name="new_lampiran[${lampiranCounter}][nama]" placeholder="Nama Lampiran" class="px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent" required>

                    <textarea id="${id}" name="new_lampiran[${lampiranCounter}][deskripsi]" placeholder="Deskripsi"></textarea>

                    <input type="url" name="new_lampiran[${lampiranCounter}][link_download]" placeholder="Link Download" class="px-3 py-2 border border-kemenag-green rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
                </div>
                <button type="button" onclick="removeItem(this)" class="text-sm text-red-600 cursor-pointer">Hapus</button>
            </div>
        `);

        // Inisialisasi TinyMCE untuk textarea lampiran yang baru dibuat
        initTiny(`#${id}`);
    }
</script>
@endsection
