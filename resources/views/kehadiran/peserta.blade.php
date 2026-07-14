@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="m-0">
                Data Peserta
            </h1>

            <small class="text-muted">
                Daftar seluruh peserta yang pernah melakukan absensi
            </small>
        </div>

    </div>

    <!-- Tabel Peserta -->
    <div class="card shadow-sm">

        <div class="card-header">
            <h3 class="card-title">
                Data Peserta
            </h3>
        </div>

        <div class="card-body">

            <table id="tablePeserta"
                   class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tim</th>
                        <th>Total Hadir</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($peserta as $index => $item)

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td>
                            {{ $item->nama }}
                        </td>

                        <td>
                            {{ $item->jabatan }}
                        </td>

                        <td>
                            {{ $item->tim }}
                        </td>

                        <td>
                            <span class="badge badge-success">
                                {{ $item->total_hadir }}
                            </span>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5"
                            class="text-center text-muted">
                            Belum ada data peserta
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

$(function () {

    $('#tablePeserta').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        language: {
            search: "Cari Peserta:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        }
    });

});

</script>

@endpush