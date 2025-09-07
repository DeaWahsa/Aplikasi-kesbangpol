<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sielok - Pelayanan Keterangan Kelompok</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }

    /* Navbar custom */
    .navbar-brand img {
      height: 50px;
    }

    /* Navbar background image & overlay */
    .navbar {
      position: relative;
      background: url('landing/assets/img/bg.jpeg') center/cover no-repeat;
    }

    .navbar::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      z-index: 0;
    }

    .navbar .container {
      position: relative;
      z-index: 1;
    }

    /* Footer background image & overlay */
    footer {
      position: relative;
      background: url('landing/assets/img/bg.jpeg') center/cover no-repeat;
    }

    footer::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    footer .container {
      position: relative;
      z-index: 1;
    }

    /* Hero Section */
    .hero {
      background: url('landing/assets/img/rr.jpg') center center / cover no-repeat;
      color: white;
      position: relative;
      min-height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .hero::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 800px;
      padding: 0 20px;
    }

    /* Animasi floating dan fade loop */

    /* Animasi floating dan fade loop hanya untuk h1 */
    @keyframes floatFade {
      0% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-10px);
      }

      100% {
        transform: translateY(0);
      }
    }

    .hero-content .animate-text {
      display: inline-block;
      animation: floatFade 3s ease-in-out infinite;
    }

    .hero-content .animate-text {
      animation: floatFade 3s ease-in-out infinite;
    }

    .hero-content .animate-button {
      animation: floatFade 3s ease-in-out infinite 0.5s;
    }

    /* Section Card */
    .card img {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="landing/assets/img/juara2.png" alt="Sielok Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="#informasi">Informasi</a></li>
          <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('login-page')}}">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content container">
      <h1 class="display-4 fw-bold animate-text">Selamat Datang di SIELOK</h1>
      <p class="lead">Sistem Informasi Layanan Kelompok</p>
      <a href="#informasi" class="btn btn-light btn-lg mt-3">Pelajari Lebih Lanjut</a>
    </div>
  </section>

  <!-- Tentang Section -->
  <section id="tentang" class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="{{asset('/')}}landing/assets/img/bupati.png" class="img-fluid rounded shadow" alt="Foto Bupati">
        </div>
        <div class="col-md-6">
          <h2 class="fw-bold">Tentang Sielok</h2>
          <p>Sielok adalah aplikasi resmi untuk mempermudah masyarakat dalam mengurus keterangan kelompok. Aplikasi ini menyediakan layanan cepat, transparan, dan terintegrasi dengan pemerintah daerah.</p>
          <ul>
            <li>Proses pengurusan cepat dan mudah</li>
            <li>Informasi lengkap dan terpercaya</li>
            <li>Dukungan langsung dari pemerintah daerah</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Informasi Section -->
  <section id="informasi" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center fw-bold mb-4">Informasi Terbaru</h2>
      <!-- Pastikan Bootstrap Icons sudah dimasukkan di head -->


      <div class="row g-4 text-center">
  <div class="col-md-4">
    <div class="card shadow-sm py-4">
      <i class="bi bi-newspaper" style="font-size: 3rem; color:#0d6efd;"></i>
      <div class="card-body">
        <h5 class="card-title">Berita Layanan</h5>
        <p class="card-text">Update terbaru mengenai pengurusan keterangan kelompok di wilayah Anda.</p>
        <a href="#" class="btn btn-primary btn-sm">Selengkapnya</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm py-4">
      <i class="bi bi-journal-text" style="font-size: 3rem; color:#0d6efd;"></i>
      <div class="card-body">
        <h5 class="card-title">Panduan Pengurusan</h5>
        <p class="card-text">Langkah-langkah lengkap untuk mengurus keterangan kelompok melalui Sielok.</p>
        <a href="#" class="btn btn-primary btn-sm">Selengkapnya</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm py-4">
      <i class="bi bi-headset" style="font-size: 3rem; color:#0d6efd;"></i>
      <div class="card-body">
        <h5 class="card-title">Kontak Bantuan</h5>
        <p class="card-text">Tim layanan Sielok siap membantu jika Anda mengalami kesulitan.</p>
        <a href="#kontak" class="btn btn-primary btn-sm">Hubungi</a>
      </div>
    </div>
  </div>
</div>

    </div>
  </section>

  <!-- Footer -->
  <footer id="kontak" class="text-white text-center py-4">
    <div class="container">
      <p class="mb-1">Sielok &copy; 2025. Semua hak dilindungi.</p>
      <p>Hubungi kami: <a href="mailto:info@sielok.id" class="text-white">info@sielok.id</a></p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>