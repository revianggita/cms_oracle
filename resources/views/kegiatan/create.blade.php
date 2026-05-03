<x-app-layout>
    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">
                
                <h1 class="text-2xl font-semibold mb-6">
                    Tambah Kegiatan
                </h1>
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('kegiatan.store') }}" method="POST">
                    @csrf

                    {{-- Nama kegiatan --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">
                            Nama Kegiatan
                        </label>
                        <input 
                            type="text"
                            name="nama_kegiatan"
                            value="{{ old('nama_kegiatan') }}"
                            class="w-full border rounded-lg px-3 py-2"
                            required
                        >
                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">
                            Tanggal Kegiatan
                        </label>
                        <input 
                            type="date"
                            name="tanggal_kegiatan"
                            value="{{ old('tanggal_kegiatan') }}"
                            class="w-full border rounded-lg px-3 py-2"
                            required
                        >
                    </div>

                    {{-- Waktu --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">
                            Waktu Mulai
                        </label>
                        <input 
                            type="time"
                            name="waktu_mulai"
                            value="{{ old('waktu_mulai') }}"
                            class="w-full border rounded-lg px-3 py-2"
                            required
                        >
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('kegiatan.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-black rounded-lg hover:bg-indigo-700">
                            Simpan
                        </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>