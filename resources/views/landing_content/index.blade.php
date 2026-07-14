@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('content')

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
            <h1 class="m-0">Content Landing Page</h1>
            <small class="text-muted">
                Kelola isi landing page website
            </small>
        </div>

        <a href="{{ route('landing-content.create') }}"
            class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Tambah Content

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-header">

            <h3 class="card-title">
                Daftar Content
            </h3>

        </div>

        <div class="card-body">

            <table id="contentTable"
                class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Urutan</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($contents as $content)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $content->judul }}</td>

                        <td>{{ Str::limit($content->deskripsi,70) }}</td>

                        <td>
                            <i class="fas {{ $content->icon }}"></i>
                            {{ $content->icon }}
                        </td>

                        <td>
                            @if($content->status == 'aktif')
                            <span class="badge badge-success">Aktif</span>
                            @else
                            <span class="badge badge-danger">Nonaktif</span>
                            @endif
                        </td>

                        <td>{{ $content->urutan }}</td>

                        <td>

                            <a href="{{ route('landing-content.edit',$content->id) }}"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('landing-content.destroy',$content->id) }}"
                                method="POST"
                                class="d-inline delete-form">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>
    $(function() {

        $('#contentTable').DataTable({

            responsive: true,
            autoWidth: false,
            pageLength: 10,

            language: {

                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                zeroRecords: "Tidak ada data",
                emptyTable: "Belum ada content",

                paginate: {

                    previous: "Sebelumnya",
                    next: "Berikutnya"

                }

            }

        });

        $('.delete-form').submit(function(e) {

            e.preventDefault();

            let form = this;

            Swal.fire({

                title: 'Hapus Content?',
                text: 'Data tidak dapat dikembalikan.',
                icon: 'warning',

                showCancelButton: true,

                confirmButtonText: 'Ya',

                cancelButtonText: 'Batal'

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });

        });

    });
</script>

@endpush