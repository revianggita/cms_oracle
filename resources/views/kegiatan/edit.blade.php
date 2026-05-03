<x-app-layout>
    <div class="py-8">
        <div class="max-w-3xl mx-auto">

            <div class="bg-gray-100 shadow rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Edit Kegiatan
                </h1>

                {{-- Error Validation --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kegiatan.update', $kegiatan->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    {{-- Nama kegiatan --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">
                            Nama Kegiatan
                        </label>

                        <input
                            type="text"
                            name="nama_kegiatan"
                            value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}"
                            class="w-full border rounded px-3 py-2"
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
                            value="{{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('Y-m-d') }}"
                            class="w-full border rounded px-3 py-2"
                            required
                        >
                    </div>


                    {{-- Waktu --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">
                            Waktu Mulai
                        </label>

                        <input
                            type="time"
                            name="waktu_mulai"
                            value="{{ \Carbon\Carbon::parse($kegiatan->waktu_mulai)->format('H:i') }}"
                            class="w-full border rounded px-3 py-2"
                            required
                        >
                    </div>


                    {{-- Status --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full border rounded px-3 py-2">

                            <option value="aktif"
                                {{ $kegiatan->status == 'aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="nonaktif"
                                {{ $kegiatan->status == 'nonaktif' ? 'selected' : '' }}>
                                Nonaktif
                            </option>

                        </select>
                    </div>


                    {{-- Button --}}
                    <div class="flex gap-3">

                        <button type="submit"
                                class="bg-indigo-600 text-blackpx-4 py-2 rounded">
                            Update
                        </button>

                        <a href="{{ route('kegiatan.index') }}"
                           class="bg-gray-500 text-black px-4 py-2 rounded">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>