<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absensi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-body">

                        <h3 class="mb-2">
                            Form Absensi
                        </h3>

                        <p class="text-muted">
                            {{ $kegiatan->nama_kegiatan }}
                        </p>


                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('absen.store') }}" method="POST">

                            @csrf

                            <input type="hidden"
                                name="kegiatan_id"
                                value="{{ $kegiatan->id }}">


                            {{-- Nama --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Nama
                                </label>

                                <input type="text"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    class="form-control"
                                    required>
                            </div>


                            {{-- Jabatan --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Jabatan
                                </label>

                                <input type="text"
                                    name="jabatan"
                                    value="{{ old('jabatan') }}"
                                    class="form-control"
                                    required>
                            </div>


                            {{-- Tim --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Tim / Divisi
                                </label>

                                <input type="text"
                                    name="tim"
                                    value="{{ old('tim') }}"
                                    class="form-control"
                                    required>
                            </div>


                            {{-- Signature --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Tanda Tangan
                                </label>

                                <canvas id="signature-pad"
                                    class="border rounded w-100"
                                    height="150">
                                </canvas>

                                <input type="hidden"
                                    name="tanda_tangan"
                                    id="tanda_tangan">

                            </div>

                            <div class="mb-3">
                                <div class="g-recaptcha"
                                    data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}">
                                </div>
                            </div>

                            <div class="d-flex gap-2">

                                <button type="button"
                                    id="clear"
                                    class="btn btn-secondary">
                                    Clear
                                </button>

                                <button type="submit"
                                    class="btn btn-primary"
                                    id="submitBtn">
                                    Kirim Absensi
                                </button>

                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <script>
        const canvas = document.getElementById('signature-pad');

        const signaturePad = new SignaturePad(canvas);

        document.getElementById('clear')
            .addEventListener('click', function() {
                signaturePad.clear();
            });

        document.querySelector('form')
            .addEventListener('submit', function(e) {

                if (signaturePad.isEmpty()) {

                    e.preventDefault();

                    alert('Tanda tangan wajib diisi');

                    return;
                }

                document.getElementById('tanda_tangan').value =
                    signaturePad.toDataURL();
            });
    </script>

</body>

</html>