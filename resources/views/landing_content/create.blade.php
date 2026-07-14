@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Tambah Content Landing Page</h3>
    </div>

    <form action="{{ route('landing-content.store') }}" method="POST">

        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Judul</label>

                <input
                    type="text"
                    name="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}">

                @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label>Icon FontAwesome</label>

                <input
                    type="text"
                    name="icon"
                    class="form-control"
                    placeholder="fa-calendar-alt"
                    value="{{ old('icon') }}">

                <small class="text-muted">
                    Contoh:
                    fa-calendar-alt,
                    fa-users,
                    fa-file-pdf,
                    fa-qrcode
                </small>

            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status" class="form-control">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <div class="form-group">
                <label>Urutan</label>

                <input type="number"
                    name="urutan"
                    class="form-control"
                    value="1">
            </div>

        </div>

        <div class="card-footer">

            <a href="{{ route('landing-content.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

            <button class="btn btn-primary">

                Simpan

            </button>

        </div>

    </form>

</div>

@endsection