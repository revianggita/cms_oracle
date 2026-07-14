@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h1>
            Laporan Kehadiran
        </h1>
        <div class="div">
        <a href="{{ route('dashboard') }}"
           class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
</div>
    </div>

    <div class="card">

        <div class="card-header">
            Statistik Kehadiran per Kegiatan
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Total Peserta</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($kegiatan as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->nama_kegiatan }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}
                        </td>

                        <td>

                            <span class="badge badge-primary">
                                {{ $item->kehadiran_count }}
                            </span>

                        </td>

                        <td>

                            <a href="{{ route('kegiatan.show', $item->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>
                                Detail

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center">
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