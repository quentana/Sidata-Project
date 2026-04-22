@extends('templates.app')

@section('content')
    <x-navbar></x-navbar>
    <div class="p-4 sm:ml-64" style="margin-left: 250px; padding: 20px;">
        
        <!-- Breadcrumb -->
        <div class="d-flex align-items-center mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-secondary text-decoration-none">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.jurusans.index') }}" class="text-secondary text-decoration-none">Data Jurusan</a></li>
                    <li class="breadcrumb-item active text-dark fw-semibold">Tambah Jurusan</li>
                </ol>
            </nav>
        </div>

        <!-- Main Card -->
        <div class="card shadow border-0 mx-auto" style="max-width: 800px;">
            <!-- Card Header -->
            <div class="card-header bg-primary text-white py-4">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center me-3" 
                         style="width: 50px; height: 50px;">
                        <i class="fas fa-plus fa-lg text-white"></i>
                    </div>
                    <div>
                        <h4 class="card-title mb-0">Tambah Data Jurusan</h4>
                        <small class="opacity-75">Isi form berikut untuk menambahkan jurusan baru</small>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-5">
                @if (Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('admin.jurusans.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    
                    <div class="row">
                        <!-- Nama Jurusan -->
                        <div class="col-md-12 mb-4">
                            <label for="nama_jurusan" class="form-label fw-semibold">
                                <i class="fas fa-book me-2 text-primary"></i>Nama Jurusan
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-graduation-cap text-muted"></i>
                                </span>
                                <input type="text" 
                                       name="nama_jurusan" 
                                       id="nama_jurusan"
                                       class="form-control @error('nama_jurusan') is-invalid @enderror" 
                                       value="{{ old('nama_jurusan') }}"
                                       placeholder="Masukkan nama jurusan"
                                       required>
                                @error('nama_jurusan')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <small class="form-text text-muted mt-1">
                                Contoh: Teknik Informatika, Manajemen Bisnis, Akuntansi
                            </small>
                        </div>

                        <!-- Kode Jurusan -->
                        <div class="col-md-12 mb-4">
                            <label for="kode_jurusan" class="form-label fw-semibold">
                                <i class="fas fa-code me-2 text-primary"></i>Kode Jurusan
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-hashtag text-muted"></i>
                                </span>
                                <input type="text" 
                                       name="kode_jurusan" 
                                       id="kode_jurusan"
                                       class="form-control @error('kode_jurusan') is-invalid @enderror" 
                                       value="{{ old('kode_jurusan') }}"
                                       placeholder="Masukkan kode jurusan"
                                       required>
                                @error('kode_jurusan')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <small class="form-text text-muted mt-1">
                                Contoh: TI, MB, AKT (maksimal 5 karakter)
                            </small>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('admin.jurusans.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <div>
                                    <button type="reset" class="btn btn-outline-danger me-2">
                                        <i class="fas fa-redo me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-paper-plane me-2"></i>Simpan Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="card border-0 bg-light mt-4 mx-auto" style="max-width: 800px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-lightbulb text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Tips Pengisian</h6>
                                <small class="text-muted">Pastikan data yang dimasukkan sudah benar dan sesuai</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-shield-alt text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Data Terjamin</h6>
                                <small class="text-muted">Data Anda akan disimpan dengan aman dan terenkripsi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 12px;
        overflow: hidden;
    }
    
    .card-header {
        border-bottom: none;
    }
    
    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #2c5aa0;
    }
    
    .input-group-text {
        background-color: #f8f9fa;
        border-right: none;
    }
    
    .form-control {
        border-left: none;
        padding: 12px 15px;
        border-radius: 0 8px 8px 0;
    }
    
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(44, 90, 160, 0.25);
        border-color: #2c5aa0;
    }
    
    .btn {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #2c5aa0 0%, #1e3a8a 100%);
        border: none;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #1e3a8a 0%, #2c5aa0 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(44, 90, 160, 0.3);
    }
    
    .alert {
        border: none;
        border-radius: 8px;
        border-left: 4px solid;
    }
    
    .alert-danger {
        border-left-color: #dc3545;
        background-color: rgba(220, 53, 69, 0.1);
    }
    
    .alert-success {
        border-left-color: #198754;
        background-color: rgba(25, 135, 84, 0.1);
    }
    
    .breadcrumb {
        background: transparent;
        padding: 0;
    }
    
    .breadcrumb-item.active {
        color: #2c5aa0;
        font-weight: 600;
    }
    
    .needs-validation .form-control:invalid {
        border-color: #dc3545;
    }
    
    .needs-validation .form-control:valid {
        border-color: #198754;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                if (alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            }, 5000);
        });
        
        // Form validation
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
        
        // Auto capitalize first letter of each word for nama jurusan
        const namaJurusanInput = document.getElementById('nama_jurusan');
        if (namaJurusanInput) {
            namaJurusanInput.addEventListener('blur', function() {
                this.value = this.value.replace(/\w\S*/g, function(txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                });
            });
        }
        
        // Auto uppercase for kode jurusan
        const kodeJurusanInput = document.getElementById('kode_jurusan');
        if (kodeJurusanInput) {
            kodeJurusanInput.addEventListener('input', function() {
                this.value = this.value.toUpperCase();
            });
        }
    });
</script>
@endpush