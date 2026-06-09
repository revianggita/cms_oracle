@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row">

        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalKegiatan }}</h3>
                    <p>Total Kegiatan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="{{ route('kegiatan.index') }}" class="small-box-footer">
                    Lihat Kegiatan
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $kegiatanAktif }}</h3>
                    <p>Kegiatan Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="small-box-footer">
                    &nbsp;
                </div>
                <!-- <a href="{{ route('kegiatan.index') }}" class="small-box-footer">
                    Lihat Kegiatan
                <i class="fas fa-arrow-circle-right"></i>
                </a> -->
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalPeserta }}</h3>
                    <p>Total Peserta</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="small-box-footer">
                    &nbsp;
                </div>
                <!-- <a href="{{ route('kegiatan.index') }}" class="small-box-footer">
                    Lihat Data
                <i class="fas fa-arrow-circle-right"></i>
                </a> -->
            </div>
        </div>

    </div>

    <!-- Grafik -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Grafik Kehadiran per Kegiatan
            </h3>
        </div>

        <div class="card-body">
            <canvas id="chartKehadiran" height="100"></canvas>
        </div>
    </div>

    <!-- Kegiatan Terbaru -->
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                Kegiatan Terbaru
            </h3>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($recentKegiatan as $item)

                    <tr>

                        <td>{{ $item->nama_kegiatan }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}
                        </td>

                        <td>
                            @if($item->status == 'aktif')
                                <span class="badge badge-success">
                                    Aktif
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    Selesai
                                </span>
                            @endif
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="3" class="text-center">
                            Belum ada kegiatan
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Ringkasan -->
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                Ringkasan Sistem
            </h3>
        </div>

        <div class="card-body">

            <ul>
                <li>Total Kegiatan : <strong>{{ $totalKegiatan }}</strong></li>
                <li>Total Kehadiran : <strong>{{ $totalKehadiran }}</strong></li>
                <li>Total Peserta : <strong>{{ $totalPeserta }}</strong></li>

                @if($kegiatanTerbaru)
                <li>
                    Kegiatan Terbaru :
                    <strong>{{ $kegiatanTerbaru->nama_kegiatan }}</strong>
                </li>
                @endif
            </ul>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>

const ctx = document.getElementById('chartKehadiran').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            label: 'Jumlah Kehadiran',
            data: @json($chartData),
            backgroundColor: '#17a2b8',
            borderColor: '#138496',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});
</script>
@endpush