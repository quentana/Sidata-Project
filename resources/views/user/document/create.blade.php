@extends('templates.app')

@section('content')
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64" style="margin-left: 250px; padding: 20px;">

    <!-- Breadcrumb -->
    <div class="d-flex align-items-center mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#" class="text-secondary text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-secondary text-decoration-none">Dokumen</a></li>
                <li class="breadcrumb-item active text-primary fw-semibold">Upload Dokumen</li>
            </ol>
        </nav>
    </div>

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">
                <i class="fas fa-file-upload text-primary me-2"></i>Upload Dokumen Siswa
            </h4>
            <p class="text-muted mb-0">Unggah dokumen persyaratan administrasi siswa</p>
        </div>
        <a href="#" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <!-- Main Card -->
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-3">
            <div class="d-flex align-items-center">
                <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center me-3"
                     style="width: 40px; height: 40px;">
                    <i class="fas fa-folder-open text-white"></i>
                </div>
                <div>
                    <h5 class="card-title mb-0">Form Upload Dokumen</h5>
                    <small class="opacity-75">Format yang didukung: PDF, JPG, PNG (Maks. 2MB per file)</small>
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Terjadi kesalahan!</strong> Silakan periksa kembali form Anda.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('user.documents.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <!-- Akte Kelahiran -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="document-upload-card">
                            <div class="d-flex align-items-start">
                                <div class="document-icon me-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-birthday-cake text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="akte_kelahiran" class="form-label fw-semibold">
                                        Akte Kelahiran
                                    </label>
                                    <p class="text-muted small mb-2">
                                        Upload scan/foto akte kelahiran siswa (Format: PDF, JPG, PNG, Maks. 2MB)
                                    </p>
                                    <div class="input-group">
                                        <input type="file"
                                               name="akte_kelahiran"
                                               id="akte_kelahiran"
                                               class="form-control @error('akte_kelahiran') is-invalid @enderror"
                                               accept=".pdf,.jpg,.jpeg,.png"
                                               required>
                                        @error('akte_kelahiran')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="file-preview mt-2" id="akte_kelahiran_preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kartu Keluarga -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="document-upload-card">
                            <div class="d-flex align-items-start">
                                <div class="document-icon me-3">
                                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-home text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="kartu_keluarga" class="form-label fw-semibold">
                                        Kartu Keluarga
                                    </label>
                                    <p class="text-muted small mb-2">
                                        Upload scan/foto kartu keluarga (Format: PDF, JPG, PNG, Maks. 2MB)
                                    </p>
                                    <div class="input-group">
                                        <input type="file"
                                               name="kartu_keluarga"
                                               id="kartu_keluarga"
                                               class="form-control @error('kartu_keluarga') is-invalid @enderror"
                                               accept=".pdf,.jpg,.jpeg,.png"
                                               required>
                                        @error('kartu_keluarga')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="file-preview mt-2" id="kartu_keluarga_preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KTP Ayah -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="document-upload-card">
                            <div class="d-flex align-items-start">
                                <div class="document-icon me-3">
                                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-male text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="KTP_Ayah" class="form-label fw-semibold">
                                        KTP Ayah
                                    </label>
                                    <p class="text-muted small mb-2">
                                        Upload scan/foto KTP ayah (Format: PDF, JPG, PNG, Maks. 2MB)
                                    </p>
                                    <div class="input-group">
                                        <input type="file"
                                               name="KTP_Ayah"
                                               id="KTP_Ayah"
                                               class="form-control @error('KTP_Ayah') is-invalid @enderror"
                                               accept=".pdf,.jpg,.jpeg,.png"
                                               required>
                                        @error('KTP_Ayah')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="file-preview mt-2" id="KTP_Ayah_preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KTP Ibu -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="document-upload-card">
                            <div class="d-flex align-items-start">
                                <div class="document-icon me-3">
                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-female text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="KTP_Ibu" class="form-label fw-semibold">
                                        KTP Ibu
                                    </label>
                                    <p class="text-muted small mb-2">
                                        Upload scan/foto KTP ibu (Format: PDF, JPG, PNG, Maks. 2MB)
                                    </p>
                                    <div class="input-group">
                                        <input type="file"
                                               name="KTP_Ibu"
                                               id="KTP_Ibu"
                                               class="form-control @error('KTP_Ibu') is-invalid @enderror"
                                               accept=".pdf,.jpg,.jpeg,.png"
                                               required>
                                        @error('KTP_Ibu')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="file-preview mt-2" id="KTP_Ibu_preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="reset" class="btn btn-outline-danger">
                                <i class="fas fa-redo me-2"></i>Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-upload me-2"></i>Upload Semua Dokumen
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Info Card -->
    <div class="card border-0 bg-light mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 40px; height: 40px;">
                            <i class="fas fa-lightbulb text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Tips Upload</h6>
                            <small class="text-muted">
                                Pastikan dokumen jelas terbaca, tidak blur, dan format file sesuai
                            </small>
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
                            <h6 class="mb-1">Keamanan Data</h6>
                            <small class="text-muted">
                                Dokumen Anda akan disimpan dengan aman dan terenkripsi
                            </small>
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

    .document-upload-card {
        border: 2px dashed #e9ecef;
        border-radius: 10px;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .document-upload-card:hover {
        border-color: #2c5aa0;
        background-color: rgba(44, 90, 160, 0.02);
    }

    .document-icon {
        flex-shrink: 0;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #2c5aa0;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px 15px;
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

    .file-preview {
        min-height: 20px;
    }

    .preview-item {
        background: #f8f9fa;
        border-radius: 6px;
        padding: 8px 12px;
        margin-top: 5px;
        font-size: 14px;
    }
</style>
@endpush

{{-- @push('scripts')
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

        // File preview functionality
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                const previewId = this.id + '_preview';
                const previewElement = document.getElementById(previewId);

                if (file) {
                    const fileSize = (file.size / 1024 / 1024).toFixed(2); // MB
                    const fileName = file.name.length > 30 ?
                        file.name.substring(0, 30) + '...' : file.name;

                    previewElement.innerHTML = `
                        <div class="preview-item d-flex align-items-center">
                            <i class="fas fa-file text-primary me-2"></i>
                            <span class="me-2">${fileName}</span>
                            <small class="text-muted">(${fileSize} MB)</small>
                            <span class="badge bg-success ms-2">
                                <i class="fas fa-check me-1"></i>Siap diupload
                            </span>
                        </div>
                    `;
                } else {
                    previewElement.innerHTML = '';
                }
            });
        });

        // File size validation
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', function(event) {
                const fileInputs = form.querySelectorAll('input[type="file"]');
                let isValid = true;

                fileInputs.forEach(input => {
                    if (input.files.length > 0) {
                        const file = input.files[0];
                        const fileSize = file.size / 1024 / 1024; // MB

                        if (fileSize > 2) {
                            isValid = false;
                            input.classList.add('is-invalid');
                            const errorDiv = input.parentElement.querySelector('.invalid-feedback') ||
                                           document.createElement('div');
                            errorDiv.className = 'invalid-feedback d-block';
                            errorDiv.innerHTML = '<i class="fas fa-exclamation-circle me-1"></i>Ukuran file melebihi 2MB';
                            if (!input.parentElement.querySelector('.invalid-feedback')) {
                                input.parentElement.appendChild(errorDiv);
                            }
                        }
                    }
                });

                if (!form.checkValidity() || !isValid) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });


    });
</script>
@endpush --}}
