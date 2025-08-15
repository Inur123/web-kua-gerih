@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm mb-8">
    <h3 class="font-semibold text-kemenag-green text-2xl mb-4">Edit Layanan</h3>

    <!-- Form Edit Layanan -->
    <form action="{{ route('layanans.update', $layanan) }}" method="POST" id="layananForm">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
            <input type="text" name="nama" id="nama" required value="{{ old('nama', $layanan->nama) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
            @error('nama')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="active"
                           {{ old('status', $layanan->status) == 'active' ? 'checked' : '' }}
                           class="text-kemenag-green focus:ring-kemenag-green">
                    <span class="ml-2">Active</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="inactive"
                           {{ old('status', $layanan->status) == 'inactive' ? 'checked' : '' }}
                           class="text-kemenag-green focus:ring-kemenag-green">
                    <span class="ml-2">inactive</span>
                </label>
            </div>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Hidden input for persyaratan data -->
        <input type="hidden" name="persyaratan_data" id="persyaratanData">

        <!-- Daftar Persyaratan -->
        <div class="mt-8 mb-6">
            <div class="flex justify-between items-center mb-2">
                <h4 class="font-semibold text-gray-700">Persyaratan</h4>
                <button type="button" onclick="addPersyaratanField()" class="text-sm text-kemenag-green hover:underline">
                    + Tambah Persyaratan
                </button>
            </div>

            <div id="persyaratanContainer">
                <!-- Existing persyaratan -->
                @foreach($layanan->persyaratans as $index => $syarat)
                <div class="persyaratan-item mb-4 p-3 border border-gray-200 rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" name="existing_persyaratan[{{$syarat->id}}][nama]"
                                   value="{{ $syarat->nama }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <input type="text" name="existing_persyaratan[{{$syarat->id}}][deskripsi]"
                                   value="{{ $syarat->deskripsi }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Link Download</label>
                            <input type="url" name="existing_persyaratan[{{$syarat->id}}][link_download]"
                                   value="{{ $syarat->link_download }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <button type="button" onclick="removePersyaratan(this, {{$syarat->id}})"
                            class="text-sm text-red-600 hover:text-red-800">
                        Hapus
                    </button>
                </div>
                @endforeach

                <!-- New persyaratan fields will be added here -->
            </div>
        </div>

        <div class="flex gap-2 mt-6">
            <button type="submit" class="px-4 py-2 bg-kemenag-green text-white rounded-md hover:bg-green-700">
                Simpan Perubahan
            </button>
            <a href="{{ route('layanans.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    let persyaratanCounter = 0;

    function addPersyaratanField() {
        persyaratanCounter++;
        const container = document.getElementById('persyaratanContainer');

        const newField = document.createElement('div');
        newField.className = 'persyaratan-item mb-4 p-3 border border-gray-200 rounded-lg';
        newField.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="new_persyaratan[${persyaratanCounter}][nama]" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <input type="text" name="new_persyaratan[${persyaratanCounter}][deskripsi]"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Link Download</label>
                    <input type="url" name="new_persyaratan[${persyaratanCounter}][link_download]"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
            </div>
            <button type="button" onclick="removePersyaratan(this)"
                    class="text-sm text-red-600 hover:text-red-800">
                Hapus
            </button>
        `;

        container.appendChild(newField);
    }

    function removePersyaratan(button, persyaratanId = null) {
        const item = button.closest('.persyaratan-item');

        if (persyaratanId) {
            // For existing persyaratan, we'll mark it for deletion
            const deleteInput = document.createElement('input');
            deleteInput.type = 'hidden';
            deleteInput.name = `delete_persyaratan[]`;
            deleteInput.value = persyaratanId;
            document.getElementById('layananForm').appendChild(deleteInput);
        }

        item.remove();
    }
</script>
@endsection
