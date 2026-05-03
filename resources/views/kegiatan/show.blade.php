<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Detail Kegiatan
                </h1>

                <div class="space-y-4">

                    <div>
                        <p class="text-sm text-gray-500">Nama Kegiatan</p>
                        <p class="font-medium">
                            {{ $kegiatan->nama_kegiatan }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Tanggal</p>
                        <p>
                            {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d M Y') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Waktu</p>
                        <p>
                            {{ \Carbon\Carbon::parse($kegiatan->waktu_mulai)->format('H:i') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Link Absensi</p>

                        <div class="flex gap-2 mt-2">

                            <input
                                type="text"
                                id="linkAbsensi"
                                readonly
                                value="{{ url('/absen/'.$kegiatan->token_link) }}"
                                class="w-full border rounded px-3 py-2"
                            >

                            <button
                                onclick="copyLink()"
                                class="bg-green-500 text-white px-4 rounded">
                                Copy
                            </button>

                        </div>
                    </div>

                </div>

                {{-- =======================
                     TABEL ABSENSI
                ======================== --}}
                <div class="mt-10">
                    <h2 class="text-xl font-semibold mb-4">
                        Daftar Peserta yang Sudah Absen
                    </h2>

                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-200 text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2 text-left">No</th>
                                    <th class="border px-4 py-2 text-left">Nama</th>
                                    <th class="border px-4 py-2 text-left">Waktu Absen</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($kegiatan->kehadiran ?? [] as $index => $absen)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="border px-4 py-2">{{ $absen->nama }}</td>
                                        <td class="border px-4 py-2">
                                            {{ \Carbon\Carbon::parse($absen->waktu_absen)->format('d M Y H:i') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="border px-4 py-2 text-center text-gray-500">
                                            Belum ada yang absen
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- BACK BUTTON --}}
                <div class="mt-6">
                    <a href="{{ route('kegiatan.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded">
                        Kembali
                    </a>
                </div>

            </div>

        </div>
    </div>

    <script>
        function copyLink() {
            let copyText = document.getElementById("linkAbsensi");

            copyText.select();
            copyText.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(copyText.value);

            alert("Link berhasil disalin");
        }
    </script>
</x-app-layout>