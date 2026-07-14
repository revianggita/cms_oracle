@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Edit Content Landing Page</h3>
    </div>

    <form action="{{ route('landing-content.update', $content->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">

                <label>Judul</label>

                <input
                    type="text"
                    name="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $content->judul) }}">

                @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">

                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $content->deskripsi) }}</textarea>

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
                    value="{{ old('icon', $content->icon) }}">

                <small class="text-muted">
                    Contoh:
                    fa-calendar-alt,
                    fa-user-check,
                    fa-file-pdf,
                    fa-qrcode
                </small>

            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status" class="form-control">
                    <option value="aktif"
                        {{ old('status', $content->status) == 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="nonaktif"
                        {{ old('status', $content->status) == 'nonaktif' ? 'selected' : '' }}>
                        Nonaktif
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Urutan</label>

                <input type="number"
                    name="urutan"
                    class="form-control"
                    value="{{ old('urutan', $content->urutan) }}">
            </div>

        </div>

        <div class="card-footer">

            <a href="{{ route('landing-content.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

            <button class="btn btn-primary">

                Update

            </button>

        </div>

    </form>

</div>

@endsection