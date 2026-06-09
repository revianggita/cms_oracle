@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="m-0">
                Edit Kegiatan
            </h1>

            <small class="text-muted">
                Ubah informasi kegiatan
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

        <div class="card-header bg-warning">

            <h3 class="card-title">
                Form Edit Kegiatan
            </h3>

        </div>

        <form action="{{ route('kegiatan.update', $kegiatan->id) }}"
              method="POST">

            @csrf
            @method('PUT')

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

                    <!-- Nama -->
                    <div class="col-md-12">

                        <div class="form-group">

                            <label>
                                Nama Kegiatan
                            </label>

                            <input
                                type="text"
                                name="nama_kegiatan"
                                value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}"
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
                                value="{{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('Y-m-d') }}"
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
                                value="{{ \Carbon\Carbon::parse($kegiatan->waktu_mulai)->format('H:i') }}"
                                class="form-control"
                                required
                            >

                        </div>

                    </div>

                    <!-- Status -->
                    <div class="col-md-12">

                        <div class="form-group">

                            <label>
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-control">

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

                    </div>

                </div>

            </div>

            <!-- Footer -->
            <div class="card-footer">

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-save"></i>
                    Update

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