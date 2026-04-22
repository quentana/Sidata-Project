@extends('templates.app')

@section('content')
    <!-- Navbar -->
    <div class="p-4 sm:ml-64" style="margin-left:250px; padding:20px;">

        <x-navbar></x-navbar>

        <!-- Banner Section -->
        <div class="container mt-4">
             @if ($approved)
                        <div class="alert alert-{{ $approved->status == 'diterima' ? 'success' : ($approved->status == 'ditolak' ? 'danger' : 'warning') }}  w-100" style="padding: 10px 100px">
                            <strong>
                                @if ($approved->status == 'diterima')
                                    Selamat! Data Anda telah DITERIMA admin.
                                @elseif($approved->status == 'ditolak')
                                    Data Anda DITOLAK admin. Silakan perbaiki.
                                @else
                                    Data Anda sedang diperiksa admin.
                                @endif
                            </strong>
                        </div>
                    @endif
            <!-- User Info & Actions -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 50px; height: 50px;">
                            <i class="fas fa-user fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark">Selamat Datang</h6>
                            <small class="text-muted">{{ Auth::user()->name ?? 'Pengguna' }}</small>
                        </div>
                    </div>
                    <br>

                </div>
            </div>

            <!-- Compact Banner Card -->
            <div class="card shadow-sm border-0 rounded-3 mb-4" style="max-width: 100%;">
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between bg-gradient-primary text-white rounded-3 p-4"
                        style="min-height: 120px; background: linear-gradient(135deg, #192077 0%, #2a3a9e 100%);">
                        <div class="d-flex align-items-center">
                            <!-- Logo Sekolah -->
                            <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 60px; height: 60px; backdrop-filter: blur(10px);">
                                <i class="fas fa-database fa-lg text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold">SISTEM INFORMASI DATA</h5>
                                <p class="mb-0 opacity-75" style="font-size: 0.8rem; max-width: 400px;">
                                    Solusi terbaik untuk mengelola dan mengakses data pendidikan di SMK Wikrama.
                                </p>
                            </div>
                        </div>
                        <!-- Status Indicator -->
                        <div class="text-end">
                            <div
                                class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 px-3 py-2">
                                <i class="fas fa-check-circle me-1"></i>
                                Aktif
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Isi Konten -->
            <div class="mt-4">
                <div class="alert alert-primary border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-info-circle fa-lg me-3"></i>
                        <div>
                            <strong class="fw-semibold">Silakan baca petunjuk di bawah ini dengan seksama!</strong><br>
                            <span class="fw-normal">Isilah bersama orangtua atau didampingi oleh orangtua.</span>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="fw-bold text-primary mb-0">
                            <i class="fas fa-list-check me-2"></i>
                            SISTEM INFORMASI MANAJEMEN PENDATAAN
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 40px; height: 40px; min-width: 40px;">
                                        <span class="text-primary fw-bold">1</span>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-2">Siapkan Dokumen</h6>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-1">
                                                <i class="fas fa-file text-success me-2"></i>
                                                <small>Akte Kelahiran</small>
                                            </li>
                                            <li class="mb-1">
                                                <i class="fas fa-file text-success me-2"></i>
                                                <small>Kartu Keluarga</small>
                                            </li>
                                            <li class="mb-1">
                                                <i class="fas fa-file text-success me-2"></i>
                                                <small>KTP Ayah</small>
                                            </li>
                                            <li>
                                                <i class="fas fa-file text-success me-2"></i>
                                                <small>KTP Ibu</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 40px; height: 40px; min-width: 40px;">
                                        <span class="text-primary fw-bold">2</span>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-2">Scan Dokumen</h6>
                                        <p class="mb-2">
                                            <small>
                                                Scan semua dokumen ke dalam bentuk JPG/JPEG atau PDF dengan ukuran maksimal
                                                2MB menggunakan aplikasi seperti
                                                <a href="https://play.google.com/store/apps/details?id=com.intsig.camscanner"
                                                    target="_blank" class="text-decoration-none">
                                                    <strong>CamScanner</strong>
                                                </a>.
                                            </small>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 40px; height: 40px; min-width: 40px;">
                                        <span class="text-primary fw-bold">3</span>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-2">Verifikasi Data</h6>
                                        <p class="mb-0">
                                            <small>Duduk bersama orang tua untuk mengisi dan melakukan verifikasi juga
                                                validasi data.</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 40px; height: 40px; min-width: 40px;">
                                        <span class="text-primary fw-bold">4</span>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-2">Login Sistem</h6>
                                        <p class="mb-0">
                                            <small>Login menggunakan username dan password masing-masing.</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #192077 0%, #2a3a9e 100%) !important;
        }

        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
        }

        .btn {
            border-radius: 8px;
            font-weight: 500;
        }

        .dropdown-menu {
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            border-radius: 5px;
            margin: 2px 8px;
            width: auto;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .badge {
            border-radius: 20px;
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .p-4.sm\:ml-64 {
                margin-left: 0 !important;
                padding: 15px !important;
            }

            .d-flex.gap-3 {
                flex-direction: column;
                gap: 10px !important;
            }

            .btn {
                width: 100%;
            }

            .text-end {
                text-align: left !important;
                margin-top: 10px;
            }
        }
    </style>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth animations for cards
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(10px)';

                setTimeout(() => {
                    card.style.transition = 'all 0.3s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            });
        });
    </script> --}}
@endsection
