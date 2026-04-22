@extends('templates.app')

@section('content')
    <!-- HERO SECTION -->
    <div class="bg-dark text-white position-relative hero-section">
        <!-- Overlay gradasi -->
        <div class="position-absolute top-0 start-0 w-100 h-100 hero-overlay"></div>

        <!-- Navbar -->
        <div class="position-relative">
            <x-navbar></x-navbar>

            <!-- Notifikasi -->
            <div class="position-relative container mt-3">
                @if (Session::get('success'))
                    <div class="alert alert-success text-center">
                        {{ Session::get('success') }}
                        <b>Selamat Datang, {{ Auth::user()->name }}</b>
                    </div>
                @endif

                @if (Session::get('logout'))
                    <div class="alert alert-warning text-center">
                        {{ Session::get('logout') }}
                    </div>
                @endif
            </div>

            <!-- Konten Tengah -->
            <div class="d-flex flex-column position-relative hero-content">
                <div class="container">
                    <h1 class="fw-bold text-white display-4 hero-title">SMK WIKRAMA BOGOR</h1>
                    <p class="text-white-50 mt-3 hero-subtitle">
                        Pada Mu Negri Kami Berjanji — Lulus Wikrama Siap Membangun Negeri
                    </p>
                    <div class="mt-4">
                        <a href="#about" class="btn btn-primary btn-lg me-3 hero-btn">Tentang Kami</a>
                        <a href="#profil" class="btn btn-outline-light btn-lg hero-btn">Profil Sekolah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h2 class="section-title">Tentang SMK WIKRAMA BOGOR</h2>
                    <p class="section-text">
                        SMK Wikrama Bogor didirikan oleh Ir. Itasia Dina Sulvianti dan Dr.H.RP Agus Lelana dibawah naungan Yayasan
                        Prawitama pada tahun 1996 di bekas gudang KUD. Kompetensi keahlian yang pertama dibuka pada saat itu adalah
                        sekretaris dengan jumlah hanya 34 siswa.
                    </p>
                    <p class="section-text">Seiring berjalannya waktu, jumlah siswa SMK Wikrama Bogor setiap tahunnya terus bertambah. Sehingga pada
                        tahun 2001, secara bertahap SMK Wikrama Bogor menempati gedung yang lebih luas diatas tanah ± 5000m2,
                        berlokasi di Jalan Raya Wangun Kelurahan Sindangsari Kota Bogor. Hingga saat ini, SMK Wikrama Bogor memiliki
                        1596 siswa dengan 51 guru pendidik.</p>
                    <p class="section-text">Kompetensi keahlian di SMK Wikrama Bogor pun terus berkembang. SMK Wikrama Bogor membuka 7 kompetensi
                        keahlian, diantaranya (1) Manajemen Perkantoran dan Layanan Bisnis, (2) Pemasaran, (3) Pengembangan
                        Perangkat Lunak dan Gim, (4) Teknik Jaringan Komputer dan Telekomunikasi, (5) Desain Komunikasi Visual, (6)
                        Kuliner, dan (7) Perhotelan.</p>
                    <p class="section-text">Kesuksesan SMK Wikrama Bogor saat ini tentunya tidak lepas dari sejarah SMK Wikrama Bogor mulai dari
                        membentuk visi dan misi, kerja keras hingga diakui dunia internasional hingga prestasi dan pengharagaan yang
                        didapatkan SMK Wikrama Bogor sejak awal didirikan.</p>
                </div>

                <div class="col-md-4">
                    <img src="https://smkwikrama.sch.id/storage/1684135144-page.jpg" alt="Our Team" class="img-fluid rounded-img">
                </div>
            </div>
        </div>
    </section>

    <!-- TENTANG KAMI SECTION -->
    <section class="py-5" style="background-color: #192077;">
        <div class="container text-center">
            <h2 class="fw-bold mb-5 text-white section-title">Tentang SIDATA</h2>

            <div class="row justify-content-center">
                <div class="col-md-3 mx-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-pencil"></i>
                        </div>
                        <h4 class="feature-title">Pengisian Data</h4>
                        <p class="feature-text">Melalui SIDATA, proses pengisian data menjadi lebih efisien dan mudah.</p>
                    </div>
                </div>

                <div class="col-md-3 mx-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <h4 class="feature-title">Kelola Data</h4>
                        <p class="feature-text">Dengan tujuan utama memfasilitasi kelola data yang optimal.</p>
                    </div>
                </div>

                <div class="col-md-3 mx-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <h4 class="feature-title">Solusi</h4>
                        <p class="feature-text">Menjadi solusi yang menjembatani kebutuhan seluruh komunitas pendidikan di SMK Wikrama Bogor.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFIL SECTION -->
    <section id="profil" class="py-5" style="background-color: #192077;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-white section-title">Profil SMK Wikrama</h2>
                <p class="text-white-50">Mengenal lebih dalam tentang SMK Wikrama Bogor</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <img src="https://smkwikrama.sch.id/storage/1701159048-berita$berita.JPG"
                             class="profile-card-img" alt="Visi Misi">
                        <div class="profile-card-body">
                            <h5 class="profile-card-title">Visi & Misi</h5>
                            <p class="profile-card-text">Menjadi sekolah kejuruan terdepan yang menghasilkan lulusan berkarakter, berdaya saing global, dan siap membangun negeri.</p>
                            <a href="#" class="profile-card-link">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <img src="https://uks.smkwikrama.sch.id/public-assets/images/foto-siswa-fullscreen.png"
                             class="profile-card-img" alt="Prestasi">
                        <div class="profile-card-body">
                            <h5 class="profile-card-title">Prestasi</h5>
                            <p class="profile-card-text">SMK Wikrama Bogor telah meraih berbagai penghargaan tingkat nasional maupun internasional dalam bidang akademik dan non-akademik.</p>
                            <a href="#" class="profile-card-link">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <img src="https://smkwikrama.sch.id/storage/1695786111-post.jpg"
                             class="profile-card-img" alt="Fasilitas">
                        <div class="profile-card-body">
                            <h5 class="profile-card-title">Fasilitas</h5>
                            <p class="profile-card-text">Dilengkapi dengan laboratorium modern, ruang kelas nyaman, asrama, hingga fasilitas olahraga yang mendukung pengembangan siswa.</p>
                            <a href="#" class="profile-card-link">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAP SECTION -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4 section-title">Lokasi SMK Wikrama Bogor</h2>
            <p class="text-secondary mb-4">Jl. Raya Wangun Kelurahan Sindangsari Bogor Timur 16720</p>

            <div class="map-container shadow">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.028880370887!2d106.82671427499367!3d-6.260637161295822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c57fc509bf9f%3A0xb510b5d16cfbb7a9!2sSMK%20Wikrama%20Bogor!5e0!3m2!1sid!2sid!4v1697348431625!5m2!1sid!2sid"
                    style="border:0; width:100%; height:100%;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- FOOTER -->


    <style>
        /* Hero Section */
        .hero-section {
            background: url('https://lh3.googleusercontent.com/p/AF1QipO-4UatchH6ByPghm9XRUyp2pJ1oSgwT_OZHKi5=s1360-w1360-h1020-rw') center/cover no-repeat;
            height: 100vh;
        }

        .hero-overlay {
            background: linear-gradient(45deg, rgba(5,20,88,0.95), rgba(28,14,107,0.3));
        }

        .hero-content {
            padding-top: 15rem;
            height: 100%;
        }

        .hero-title {
            font-size: 3.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero-subtitle {
            max-width: 500px;
            font-size: 1.2rem;
        }

        .hero-btn {
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Section Titles */
        .section-title {
            position: relative;
            margin-bottom: 2rem;
            color: #192077;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: #192077;
            border-radius: 2px;
        }

        .section-title.text-white:after {
            background: white;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Section Text */
        .section-text {
            line-height: 1.8;
            margin-bottom: 1.5rem;
            color: #555;
        }

        /* Rounded Images */
        .rounded-img {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* Feature Cards */
        .feature-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            padding: 40px 25px;
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            background: #1a2b88;
            color: white;
            font-size: 32px;
            border-radius: 10px;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .feature-title {
            font-weight: 700;
            color: #1a2b88;
            margin-bottom: 15px;
        }

        .feature-text {
            color: #6c757d;
            line-height: 1.6;
        }

        /* Profile Cards */
        .profile-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .profile-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .profile-card-body {
            padding: 25px;
        }

        .profile-card-title {
            font-weight: 700;
            color: #1a2b88;
            margin-bottom: 15px;
        }

        .profile-card-text {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .profile-card-link {
            color: #1a2b88;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .profile-card-link:hover {
            color: #192077;
            text-decoration: underline;
        }

        /* Map Container */
        .map-container {
            width: 100%;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
        }

        /* Footer */
        .footer-title {
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
            font-size: 1.2rem;
        }

        .footer-text {
            color: rgba(255,255,255,0.8);
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .footer-link {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 8px;
        }

        .footer-link:hover {
            color: white;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: white;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: #1a2b88;
            transform: translateY(-3px);
            color: white;
        }

    </style>
@endsection
