@extends('admin.layouts.app')

@section('content')
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-8">
        <h3 class="font-semibold text-kemenag-green text-xl sm:text-2xl mb-4">Edit Layanan</h3>

        <!-- Form Edit Layanan -->
        <form action="{{ route('layanans.update', $layanan) }}" method="POST" id="layananForm" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
                <input type="text" name="nama" id="nama" required value="{{ old('nama', $layanan->nama) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kemenag-green focus:border-transparent">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
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
                        <span class="ml-2">Inactive</span>
                    </label>
                </div>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- ================= Persyaratan ================= -->
            <div class="mt-6">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-semibold text-gray-700">Persyaratan</h4>
                    <button type="button" onclick="addPersyaratanField()"
                        class="text-sm text-kemenag-green hover:underline">
                        + Tambah Persyaratan
                    </button>
                </div>

                <div id="persyaratanContainer" class="space-y-4">
                    @foreach ($layanan->persyaratans as $syarat)
                        <div class="persyaratan-item p-3 border rounded-lg">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                                <input type="text" name="existing_persyaratan[{{ $syarat->id }}][nama]"
                                    value="{{ $syarat->nama }}" placeholder="Nama" class="px-3 py-2 border rounded-md">
                                <input type="text" name="existing_persyaratan[{{ $syarat->id }}][deskripsi]"
                                    value="{{ $syarat->deskripsi }}" placeholder="Deskripsi"
                                    class="px-3 py-2 border rounded-md">
                                <input type="url" name="existing_persyaratan[{{ $syarat->id }}][link_download]"
                                    value="{{ $syarat->link_download }}" placeholder="Link Download"
                                    class="px-3 py-2 border rounded-md">
                            </div>
                            <button type="button" onclick="removeItem(this,'delete_persyaratan',{{ $syarat->id }})"
                                class="text-sm text-red-600 hover:text-red-800">Hapus</button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ================= Syarat Khusus ================= -->
            <div class="mt-6">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-semibold text-gray-700">Syarat Khusus / Tambahan</h4>
                    <button type="button" onclick="addSyaratKhususField()"
                        class="text-sm text-kemenag-green hover:underline">
                        + Tambah Syarat Khusus
                    </button>
                </div>

                <div id="syaratKhususContainer" class="space-y-4">
                    @foreach ($layanan->syaratKhusus as $khusus)
                        <div class="syarat-khusus-item p-3 border rounded-lg">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                                <input type="text" name="existing_syarat_khusus[{{ $khusus->id }}][nama]"
                                    value="{{ $khusus->nama }}" placeholder="Nama" class="px-3 py-2 border rounded-md">
                                <input type="text" name="existing_syarat_khusus[{{ $khusus->id }}][deskripsi]"
                                    value="{{ $khusus->deskripsi }}" placeholder="Deskripsi"
                                    class="px-3 py-2 border rounded-md">
                                <input type="url" name="existing_syarat_khusus[{{ $khusus->id }}][link_download]"
                                    value="{{ $khusus->link_download }}" placeholder="Link Download"
                                    class="px-3 py-2 border rounded-md">
                            </div>
                            <button type="button" onclick="removeItem(this,'delete_syarat_khusus',{{ $khusus->id }})"
                                class="text-sm text-red-600 hover:text-red-800">Hapus</button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ================= Prosedur ================= -->
          <div class="mt-6">
    <div class="flex justify-between items-center mb-2">
        <h4 class="font-semibold text-gray-700">Prosedur</h4>
        <button type="button" onclick="addProsedurField()"
            class="text-sm text-kemenag-green hover:underline">
            + Tambah Prosedur
        </button>
    </div>

    <div id="prosedurContainer" class="space-y-4">
        @foreach ($layanan->prosedurs as $step)
            <div class="prosedur-item p-3 border rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                    <input type="text" name="existing_prosedur[{{ $step->id }}][nama]"
                        value="{{ $step->nama }}" placeholder="Nama Prosedur"
                        class="px-3 py-2 border rounded-md w-full">
                    <input type="text" name="existing_prosedur[{{ $step->id }}][deskripsi]"
                        value="{{ $step->deskripsi }}" placeholder="Deskripsi"
                        class="px-3 py-2 border rounded-md w-full">
                    <input type="text" name="existing_prosedur[{{ $step->id }}][link_download]"
                        value="{{ $step->link_download }}" placeholder="Link Download (Opsional)"
                        class="px-3 py-2 border rounded-md w-full">
                </div>
                <button type="button"
                    onclick="removeItem(this,'delete_prosedur',{{ $step->id }})"
                    class="text-sm text-red-600 hover:text-red-800">Hapus</button>
            </div>
        @endforeach
    </div>
</div>



            <!-- Tombol -->
            <div class="flex gap-2 mt-6">
                <button type="submit" class="px-4 py-2 bg-kemenag-green text-white rounded-md hover:bg-green-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('layanans.index') }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        let persyaratanCounter = 0;
        let syaratKhususCounter = 0;
        let prosedurCounter = 0;

        function removeItem(button, deleteName, id = null) {
            const item = button.closest('div');
            if (id) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `${deleteName}[]`;
                input.value = id;
                document.getElementById('layananForm').appendChild(input);
            }
            item.remove();
        }

        function addPersyaratanField() {
            persyaratanCounter++;
            document.getElementById('persyaratanContainer').insertAdjacentHTML('beforeend', `
            <div class="persyaratan-item p-3 border rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                    <input type="text" name="new_persyaratan[${persyaratanCounter}][nama]" placeholder="Nama" class="px-3 py-2 border rounded-md" required>
                    <input type="text" name="new_persyaratan[${persyaratanCounter}][deskripsi]" placeholder="Deskripsi" class="px-3 py-2 border rounded-md">
                    <input type="url" name="new_persyaratan[${persyaratanCounter}][link_download]" placeholder="Link Download" class="px-3 py-2 border rounded-md">
                </div>
                <button type="button" onclick="removeItem(this)" class="text-sm text-red-600">Hapus</button>
            </div>
        `);
        }

        function addSyaratKhususField() {
            syaratKhususCounter++;
            document.getElementById('syaratKhususContainer').insertAdjacentHTML('beforeend', `
            <div class="syarat-khusus-item p-3 border rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                    <input type="text" name="new_syarat_khusus[${syaratKhususCounter}][nama]" placeholder="Nama" class="px-3 py-2 border rounded-md" required>
                    <input type="text" name="new_syarat_khusus[${syaratKhususCounter}][deskripsi]" placeholder="Deskripsi" class="px-3 py-2 border rounded-md">
                    <input type="url" name="new_syarat_khusus[${syaratKhususCounter}][link_download]" placeholder="Link Download" class="px-3 py-2 border rounded-md">
                </div>
                <button type="button" onclick="removeItem(this)" class="text-sm text-red-600">Hapus</button>
            </div>
        `);
        }

       function addProsedurField() {
    prosedurCounter++;
    document.getElementById('prosedurContainer').insertAdjacentHTML('beforeend', `
        <div class="prosedur-item p-3 border rounded-lg">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2">
                <input type="text" name="new_prosedur[${prosedurCounter}][nama]"
                       placeholder="Nama Prosedur" class="px-3 py-2 border rounded-md w-full" required>
                <input type="text" name="new_prosedur[${prosedurCounter}][deskripsi]"
                       placeholder="Deskripsi" class="px-3 py-2 border rounded-md w-full">
                <input type="text" name="new_prosedur[${prosedurCounter}][link_download]"
                       placeholder="Link Download (Opsional)" class="px-3 py-2 border rounded-md w-full">
            </div>
            <button type="button" onclick="removeItem(this)"
                class="text-sm text-red-600 hover:text-red-800">Hapus</button>
        </div>
    `);
}

    </script>
@endsection
