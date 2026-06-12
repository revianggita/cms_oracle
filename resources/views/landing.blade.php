<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Absensi Berbasis Web</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background: #f4f6f9;
    }

    .hero{
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .hero-title{
        font-size: 3rem;
        font-weight: 700;
        color: #343a40;
    }

    .hero-text{
        font-size: 1.1rem;
        color: #6c757d;
    }

    .feature-card{
        border: none;
        border-radius: 15px;
        transition: 0.3s;
    }

    .feature-card:hover{
        transform: translateY(-5px);
    }

    .feature-icon{
        font-size: 40px;
        margin-bottom: 10px;
    }

    footer{
        background: #ffffff;
        padding: 20px;
        text-align: center;
        color: #6c757d;
    }
</style>

</head>
<body>
<section class="hero">
    <div class="container">

    <div class="row align-items-center">

        <div class="col-md-6">

            <h1 class="hero-title">
                Sistem Absensi Berbasis Web
            </h1>

            <p class="hero-text mt-3">
                Aplikasi untuk mengelola kegiatan dan absensi peserta secara online.
                Memudahkan pencatatan kehadiran, pengelolaan kegiatan, serta pembuatan laporan absensi secara cepat dan efisien.
            </p>

            <a href="{{ route('login') }}"
               class="btn btn-primary btn-lg mt-3">
                Masuk ke Sistem
            </a>

        </div>

        <div class="col-md-6 text-center">
            <img src="{{ asset('images/office.png') }}"
                style="
                    width: 500px;
                    height: 500px;
                    object-fit: cover;
                    border-radius: 50%;
                "
                alt="Sistem Absensi">
        </div>

    </div>

    <div class="row mt-5">

        <div class="col-md-3 mb-4">
            <div class="card feature-card shadow-sm h-100">
                <div class="card-body text-center">

                    <i class="fas fa-calendar-alt fa-3x text-primary mb-3"></i>

                    <h5>Kelola Kegiatan</h5>

                    <p class="text-muted">
                        Membuat dan mengelola kegiatan absensi dengan mudah.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card feature-card shadow-sm h-100">
                <div class="card-body text-center">

                    <i class="fas fa-user-check fa-3x text-success mb-3"></i>

                    <h5>Absensi Online</h5>

                    <p class="text-muted">
                        Peserta dapat melakukan absensi melalui link yang dibagikan.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card feature-card shadow-sm h-100">
                <div class="card-body text-center">

                    <i class="fas fa-file-pdf fa-3x text-danger mb-3"></i>

                    <h5>Export PDF</h5>

                    <p class="text-muted">
                        Mengunduh laporan kehadiran dalam format PDF.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card feature-card shadow-sm h-100">
                <div class="card-body text-center">

                    <i class="fas fa-qrcode fa-3x text-dark mb-3"></i>

                    <h5>QR Code</h5>

                    <p class="text-muted">
                        Pengembangan selanjutnya untuk proses absensi yang lebih praktis.
                    </p>

                </div>
            </div>
        </div>

    </div>

</div>

</section>

<footer>
    Sistem Absensi Berbasis Web © 2026
</footer>

</body>
</html>