@extends('layouts.app')

@section('content')

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
    });
</script>
@endif

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="m-0">Daftar Kegiatan</h1>
            <small class="text-muted">
                Data seluruh kegiatan absensi
            </small>
        </div>

        <a href="{{ route('kegiatan.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Kegiatan

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-header">
            <h3 class="card-title">
                Tabel Kegiatan
            </h3>
        </div>

        <div class="card-body">

            <table id="kegiatanTable"
                   class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($kegiatans as $kegiatan)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong>
                                {{ $kegiatan->nama_kegiatan }}
                            </strong>
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d M Y') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($kegiatan->waktu_mulai)->format('H:i') }}
                        </td>

                        <td>

                            @if($kegiatan->status == 'aktif')

                                <span class="badge badge-success">
                                    Aktif
                                </span>

                            @else

                                <span class="badge badge-danger">
                                    Selesai
                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            <a href="{{ route('kegiatan.show', $kegiatan->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}"
                                method="POST"
                                class="d-inline delete-form">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            Belum ada data kegiatan
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {

    $('#kegiatanTable').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            zeroRecords: "Data tidak ditemukan",
            emptyTable: "Belum ada data kegiatan",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        }
    });

    $('.delete-form').on('submit', function(e){

        e.preventDefault();

        let form = this;

        Swal.fire({
            title: 'Hapus Kegiatan?',
            text: 'Data yang dihapus tidak dapat dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if(result.isConfirmed){
                form.submit();
            }

        });

    });

});
</script>
@endpush