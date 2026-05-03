<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">
                        Kegiatan
                    </h1>
                    <p class="text-sm text-gray-500">
                        Daftar kegiatan yang telah terdaftar.
                    </p>
                </div>

                <div class="flex items-center gap-3">

                    {{-- Search --}}
                    <form method="GET"
                          action="{{ route('kegiatan.index') }}"
                          class="hidden sm:block">
                        <input
                            type="search"
                            name="q"
                            value="{{ request('q') }}"
                            placeholder="Cari kegiatan..."
                            class="border rounded-md px-3 py-2 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        />
                    </form>

                    {{-- Button tambah --}}
                    <a href="{{ route('kegiatan.create') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-yellow rounded-md shadow-sm text-sm">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4" />
                        </svg>

                        Tambah Kegiatan
                    </a>
                </div>
            </div>

            {{-- Table --}}
            <div class="bg-yellow shadow rounded-lg overflow-hidden">
                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        {{-- Header table --}}
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    No
                                </th>

                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Nama Kegiatan
                                </th>

                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Tanggal
                                </th>

                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Waktu
                                </th>

                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        {{-- Isi table --}}
                        <tbody class="bg-white divide-y divide-gray-200">

                            @forelse($kegiatans as $kegiatan)
                                <tr class="hover:bg-gray-50">

                                    {{-- No --}}
                                    <td class="px-4 py-3 text-sm">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- Nama kegiatan --}}
                                    <td class="px-4 py-3 text-sm font-medium">
                                        {{ $kegiatan->nama_kegiatan }}
                                    </td>

                                    {{-- Tanggal --}}
                                    <td class="px-4 py-3 text-sm">
                                        {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d M Y') }}
                                    </td>

                                    {{-- Waktu --}}
                                    <td class="px-4 py-3 text-sm">
                                        {{ \Carbon\Carbon::parse($kegiatan->waktu_mulai)->format('H:i') }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-4 py-3 text-right">
                                        <div class="flex justify-end gap-2">

                                            <a href="{{ route('kegiatan.show', $kegiatan->id) }}"
                                                class="px-3 py-1 bg-blue-500 text-black rounded">
                                                    Detail
                                            </a>
                                            {{-- Edit --}}
                                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                               class="px-3 py-1 bg-yellow-400 text-black rounded">
                                                Edit
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin hapus kegiatan?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="px-3 py-1 bg-red-500 text-black rounded">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5"
                                        class="text-center py-6 text-gray-500">
                                        Belum ada data kegiatan
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                {{-- Pagination --}}
                <div class="px-4 py-3 bg-gray-50 flex justify-between items-center">

                    <div class="text-sm text-gray-600">
                        Menampilkan
                        {{ $kegiatans->firstItem() ?? 0 }}
                        -
                        {{ $kegiatans->lastItem() ?? 0 }}

                        dari

                        {{ $kegiatans->total() ?? 0 }}
                        data
                    </div>

                    <div>
                        {{ $kegiatans->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>