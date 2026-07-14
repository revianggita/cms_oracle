<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Absensi Berbasis Web</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        /* SECTION */
        #beranda,
        #statistik,
        #fitur,
        #kontak {
            scroll-margin-top: 100px;
        }

        #statistik {
            background: #ffffff;
        }

        #fitur {
            background: #eef4ff;
        }

        #kontak {
            background: #ffffff;
        }

        /* NAVBAR */
        .navbar {
            padding-top: 12px;
            padding-bottom: 12px;
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .05);
        }

        .navbar-brand {
            font-size: 1.7rem;
            font-weight: 700;
        }

        .nav-link {
            font-size: 1.05rem;
            font-weight: 500;
            transition: .3s;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg,
                    #ffffff,
                    #eef4ff);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            color: #212529;
        }

        .hero-text {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 550px;
        }

        /* SECTION TITLE */
        .section-title {
            font-weight: 700;
            position: relative;
            margin-bottom: 50px;
        }

        .section-title::after {
            content: '';
            width: 70px;
            height: 4px;
            background: #0d6efd;
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 50px;
        }

        /* STATISTIK */
        .stat-card {
            border: none;
            border-radius: 20px;
            transition: .3s;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        .stat-card .card-body {
            padding: 40px;
        }

        .stat-card h2 {
            font-size: 3rem;
            font-weight: 700;
        }

        .stat-card:hover {
            transform: translateY(-8px);
        }

        /* FITUR */
        .feature-card {
            border: none;
            border-radius: 20px;
            transition: .3s;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        .feature-card:hover {
            transform: translateY(-8px);
        }

        .feature-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        /* FOOTER */
        footer {
            background: #212529;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        footer p {
            color: rgba(255, 255, 255, .75);
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #899fc0;
            color: white;
            font-weight: bold;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 15px;
        }

        /* MOBILE */
        @media (max-width: 768px) {

            .hero {
                text-align: center;
                padding-top: 60px;
                min-height: auto;
            }

            .hero-title {
                font-size: 2.3rem;
            }

            .hero-text {
                max-width: 100%;
            }

            .stat-card .card-body,
            .feature-card .card-body {
                padding: 25px;
            }
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">

        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                Sistem Absensi
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#statistik">
                            Statistik
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">
                            Fitur
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">
                            Kontak
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>
    <section id="beranda" class="hero">
        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">
                    <h4 class="fw-bold mb-3">
                        Sistem Absensi Berbasis Web
                    </h4>

                    <h1 class="hero-title">
                        Kelola Kehadiran Peserta Secara Cepat, Akurat, dan Real-Time
                    </h1>

                    <p class="hero-text mt-4">
                        Sistem Absensi Berbasis Web yang membantu admin mengelola
                        kegiatan, mencatat kehadiran peserta secara online,
                        serta menghasilkan laporan absensi secara otomatis dan efisien.
                    </p>

                    <div class="d-flex gap-3 mt-4">

                        <a href="{{ route('login') }}"
                            class="btn btn-primary btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Masuk ke Sistem
                        </a>

                        <a href="#fitur"
                            class="btn btn-outline-primary btn-lg">
                            Pelajari Fitur
                        </a>

                    </div>

                    <!-- Highlight -->
                    <div class="row mt-5">

                        <div class="col-4">
                            <h4 class="fw-bold text-primary mb-0">
                                Mudah
                            </h4>
                            <small class="text-muted">
                                Digunakan
                            </small>
                        </div>

                        <div class="col-4">
                            <h4 class="fw-bold text-success mb-0">
                                Online
                            </h4>
                            <small class="text-muted">
                                Real-Time
                            </small>
                        </div>

                        <div class="col-4">
                            <h4 class="fw-bold text-danger mb-0">
                                PDF
                            </h4>
                            <small class="text-muted">
                                Laporan Otomatis
                            </small>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6 text-center">

                    <img src="{{ asset('images/office.png') }}"
                        class="img-fluid rounded-circle shadow"
                        style="width: 500px; height: 500px; object-fit: cover;"
                        alt="Sistem Absensi">

                </div>

            </div>

        </div>
    </section>

    <section id="statistik" class="py-5 bg-white">

        <div class="container">

            <h2 class="text-center mb-5">
                Statistik Sistem
            </h2>

            <p class="text-center text-muted mb-5">
                Ringkasan data penggunaan sistem absensi yang tersimpan
                dan dikelola secara digital.
            </p>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <div class="card stat-card shadow text-center">

                        <div class="card-body">

                            <i class="fas fa-calendar-alt fa-3x text-primary mb-3"></i>

                            <h2>{{ $totalKegiatan }}</h2>

                            <p>Total Kegiatan</p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card stat-card shadow text-center">

                        <div class="card-body">

                            <i class="fas fa-user-check fa-3x text-success mb-3"></i>

                            <h2>{{ $totalKehadiran }}</h2>

                            <p>Total Kehadiran</p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card stat-card shadow text-center">

                        <div class="card-body">

                            <i class="fas fa-users fa-3x text-warning mb-3"></i>

                            <h2>{{ $totalPeserta }}</h2>

                            <p>Total Peserta</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="py-5 bg-white">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h2>Mengapa Menggunakan Sistem Ini?</h2>

                    <p class="text-muted mt-3">
                        Sistem absensi berbasis web membantu proses
                        pencatatan kehadiran secara digital sehingga
                        lebih cepat, akurat, dan mudah dikelola.
                    </p>

                    <ul>
                        <li>Mengurangi penggunaan kertas.</li>
                        <li>Data tersimpan dengan aman.</li>
                        <li>Laporan otomatis dalam format PDF.</li>
                        <li>Dapat diakses dari berbagai perangkat.</li>
                    </ul>

                </div>

                <div class="col-md-6 text-center">

                    <i class="fas fa-chart-line fa-8x text-primary"></i>

                </div>

            </div>

        </div>

    </section>

    <!-- Fitur Sistem -->
    <section id="fitur" class="py-5">

        <div class="container">

            <h2 class="text-center mb-5">
                Fitur Sistem
            </h2>

            <p class="text-center text-muted mb-5">
                Berbagai fitur yang membantu proses pencatatan kehadiran
                menjadi lebih cepat, mudah, dan efisien.
            </p>

            <div class="row">

                <div class="row">

                    @forelse($contents as $content)

                    <div class="col-md-3 mb-4">

                        <div class="card feature-card shadow-sm h-100">

                            <div class="card-body text-center">

                                <i class="fas {{ $content->icon }} fa-3x text-primary mb-3"></i>

                                <h5>{{ $content->judul }}</h5>

                                <p class="text-muted">
                                    {{ $content->deskripsi }}
                                </p>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="col-12 text-center">

                        <p class="text-muted">
                            Belum ada content.
                        </p>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </section>

    <section class="py-5 bg-white">

        <div class="container">

            <h2 class="text-center mb-4">
                Cara Kerja Sistem
            </h2>

            <p class="text-center text-muted mb-5">
                Proses absensi dilakukan secara sederhana mulai dari pembuatan kegiatan
                hingga menghasilkan laporan kehadiran secara otomatis.
            </p>

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center">

                            <div class="step-number">
                                1
                            </div>

                            <i class="fas fa-calendar-plus fa-3x text-primary mb-3"></i>

                            <h5>Buat Kegiatan</h5>

                            <p class="text-muted mb-0">
                                Admin membuat kegiatan baru yang akan digunakan untuk proses absensi.
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center">

                            <div class="step-number">
                                2
                            </div>

                            <i class="fas fa-link fa-3x text-success mb-3"></i>

                            <h5>Bagikan Link</h5>

                            <p class="text-muted mb-0">
                                Sistem menghasilkan link absensi yang dapat dibagikan kepada peserta.
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center">

                            <div class="step-number">
                                3
                            </div>

                            <i class="fas fa-user-check fa-3x text-warning mb-3"></i>

                            <h5>Absensi Online</h5>

                            <p class="text-muted mb-0">
                                Peserta mengisi data kehadiran melalui halaman absensi yang tersedia.
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center">

                            <div class="step-number">
                                4
                            </div>

                            <i class="fas fa-file-pdf fa-3x text-danger mb-3"></i>

                            <h5>Unduh Laporan</h5>

                            <p class="text-muted mb-0">
                                Admin dapat melihat dan mengunduh laporan kehadiran dalam format PDF.
                            </p>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <section id="kontak" class="py-5">

        <div class="container">

            <h2 class="text-center mb-5">
                Kontak Pengembang
            </h2>

            <div class="row justify-content-center">

                <div class="col-md-6">

                    <div class="card shadow border-0">

                        <div class="card-body text-center">

                            <i class="fas fa-user-circle fa-5x text-primary mb-3"></i>

                            <h4>
                                Revi Anggita
                            </h4>

                            <p class="text-muted">
                                Mahasiswa Sistem Informasi
                            </p>

                            <hr>

                            <p>
                                Sistem Absensi Berbasis Web menggunakan Laravel, Oracle Database, Bootstrap dan AdminLTE.
                            </p>

                            <p>
                                Email : revi@example.com
                            </p>

                            <p>
                                GitHub : github.com/revianggita
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <h5>Sistem Absensi Berbasis Web</h5>
            <p>
                Solusi digital untuk pencatatan kehadiran yang cepat,
                akurat, dan efisien.
            </p>
            <div class="mt-3">
                <a href="#beranda" class="text-white me-3">
                    Beranda
                </a>
                <a href="#fitur" class="text-white me-3">
                    Fitur
                </a>
                <a href="#kontak" class="text-white">
                    Kontak
                </a>
            </div>
            <hr>
            <small>
                © 2026 Sistem Absensi Berbasis Web
            </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>