@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="m-0">
                Detail Kegiatan
            </h1>

            <small class="text-muted">
                Informasi kegiatan dan daftar peserta absensi
            </small>
        </div>

        <a href="{{ route('kegiatan.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </div>

    <!-- Detail Card -->
    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">

            <h3 class="card-title">
                Informasi Kegiatan
            </h3>

        </div>

        <div class="card-body">

            <div class="row">

                <!-- Nama -->
                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        Nama Kegiatan
                    </label>

                    <div class="font-weight-bold">
                        {{ $kegiatan->nama_kegiatan }}
                    </div>

                </div>

                <!-- Tanggal -->
                <div class="col-md-3 mb-3">

                    <label class="text-muted">
                        Tanggal
                    </label>

                    <div>
                        {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d M Y') }}
                    </div>

                </div>

                <!-- Waktu -->
                <div class="col-md-3 mb-3">

                    <label class="text-muted">
                        Waktu
                    </label>

                    <div>
                        {{ \Carbon\Carbon::parse($kegiatan->waktu_mulai)->format('H:i') }}
                    </div>

                </div>

            </div>

            <!-- Link Absensi -->
            <div class="mt-3">

                <label class="text-muted">
                    Link Absensi
                </label>

                <div class="input-group mt-2">

                    <input
                        type="text"
                        id="linkAbsensi"
                        readonly
                        value="{{ url('/absen/'.$kegiatan->token_link) }}"
                        class="form-control"
                    >

                    <div class="input-group-append">

                        <button
                            onclick="copyLink()"
                            class="btn btn-success">

                            <i class="fas fa-copy"></i>
                            Copy

                        </button>

                    </div>

                </div>

                <!-- QR CODE DI BAWAH INPUT -->
                <div class="mt-3 text-center">

                    <!-- <img
                        src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode(url('/absen/'.$kegiatan->token_link)) }}"
                        alt="QR Code Absensi"
                        class="border p-2 rounded"
                    >

                    <div class="text-sm text-gray-500 mt-2">
                        Scan QR untuk absensi
                    </div> -->

                    <!-- <button onclick="downloadQR()" class="btn btn-primary mt-3">
                        Download QR
                    </button> -->

                </div>

            </div>

        </div>

    </div>

    <!-- Tabel Peserta -->
    <div class="card shadow-sm mt-4">
        <div class="card-header">

            <h3 class="card-title">
                Daftar Peserta yang Sudah Absen
            </h3>

            <div class="card-tools">

                <span class="badge badge-primary">

                    {{ $kegiatan->kehadiran->count() }}
                    Peserta

                </span>

            </div>

        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-hover text-nowrap">

                <thead class="thead-light">

                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tim</th>
                        <th>Waktu Absen</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($kegiatan->kehadiran as $index => $absen)

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td class="font-weight-bold">
                            {{ $absen->nama }}
                        </td>

                        <td>
                            {{ $absen->jabatan }}
                        </td>

                        <td>
                            {{ $absen->tim }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($absen->waktu_absen)->format('d M Y H:i') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center text-muted py-4">

                            Belum ada yang absen

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>
        </div>
    </div>
    <div class="mt-4 flex justify-end">
        <a href="{{ route('kegiatan.pdf', $kegiatan->id) }}"
        class="btn btn-primary">
            Export PDF
        </a>
    </div>

</div>

<script>
    function copyLink() {

        let copyText =
            document.getElementById("linkAbsensi");

        copyText.select();
        copyText.setSelectionRange(0, 99999);

        navigator.clipboard.writeText(copyText.value);

        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Link absensi berhasil disalin',
            timer: 1500,
            showConfirmButton: false
        });
    }
</script>

@endsection
<script>
function downloadQR() {

    const url = "{{ url('/absen/'.$kegiatan->token_link) }}";

    const qrApi = "https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=" + encodeURIComponent(url);

    fetch(qrApi)
        .then(response => response.blob())
        .then(blob => {

            const link = document.createElement('a');
            const urlBlob = window.URL.createObjectURL(blob);

            link.href = urlBlob;
            link.download = "qr-{{ $kegiatan->nama_kegiatan }}.png";

            document.body.appendChild(link);
            link.click();

            document.body.removeChild(link);
            window.URL.revokeObjectURL(urlBlob);

        })
        .catch(err => {
            alert("Gagal download QR");
            console.error(err);
        });
}
</script>