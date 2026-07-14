@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="m-0">
                Tambah Kegiatan
            </h1>

            <small class="text-muted">
                Buat kegiatan absensi baru
            </small>
        </div>

        <a href="{{ route('kegiatan.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </div>

    <!-- Card -->
    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">

            <h3 class="card-title">
                Form Tambah Kegiatan
            </h3>

        </div>

        <form action="{{ route('kegiatan.store') }}"
              method="POST">

            @csrf

            <div class="card-body">

                {{-- Error Validation --}}
                @if ($errors->any())

                    <div class="alert alert-danger">

                        <h5>
                            <i class="icon fas fa-ban"></i>
                            Terjadi Kesalahan
                        </h5>

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <div class="row">

                    <!-- Nama Kegiatan -->
                    <div class="col-md-12">

                        <div class="form-group">

                            <label>
                                Nama Kegiatan
                            </label>

                            <input
                                type="text"
                                name="nama_kegiatan"
                                value="{{ old('nama_kegiatan') }}"
                                class="form-control"
                                placeholder="Masukkan nama kegiatan"
                                required
                            >

                        </div>

                    </div>

                    <!-- Tanggal -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>
                                Tanggal Kegiatan
                            </label>

                            <input
                                type="date"
                                name="tanggal_kegiatan"
                                value="{{ old('tanggal_kegiatan') }}"
                                class="form-control"
                                required
                            >

                        </div>

                    </div>

                    <!-- Waktu -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>
                                Waktu Mulai
                            </label>

                            <input
                                type="time"
                                name="waktu_mulai"
                                value="{{ old('waktu_mulai') }}"
                                class="form-control"
                                required
                            >

                        </div>

                    </div>

                </div>

            </div>

            <!-- Footer -->
            <div class="card-footer">

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="{{ route('kegiatan.index') }}"
                   class="btn btn-secondary">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection