@extends('templates.app')

@section('content')
    <x-navbar></x-navbar>
    <div class="p-4 sm:ml-64 " style="margin-left: 250px; padding: 20px;">
        <!-- Breadcrumb -->
        <div class="d-flex align-items-center mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('user.datakeluarga.index') }}"
                            class="text-secondary text-decoration-none">Data ibu</a></li>
                    <li class="breadcrumb-item active text-dark fw-semibold">Tambah Data ibu</li> --}}
                </ol>
            </nav>
        </div>

        <!-- Main Card -->
        <div class="border-0 mx-auto" >
            <!-- Card Header -->
            <div class="card-header bg-primary text-white py-4">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width: 50px; height: 50px;">
                        <i class="fas fa-plus fa-lg text-white"></i>
                    </div>

                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-5">
                @if (Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('user.datakeluargas.store') }}" method="POST">
                    @csrf

                    {{-- ==================== DATA AYAH ==================== --}}
                    <h4 class="mb-3 mt-4 fw-bold text-primary">Data Ayah</h4>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_ayah" class="form-control" placeholder="Tempat Lahir">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_ayah" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pendidikan</label>
                            <input type="text" name="pendidikan_ayah" class="form-control" placeholder="Pendidikan">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Penghasilan</label>
                            <input type="number" name="penghasilan_ayah" class="form-control" placeholder="Penghasilan">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat_ayah" class="form-control" rows="2" placeholder="Alamat lengkap"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp_ayah" class="form-control" placeholder="No HP">
                        </div>
                    </div>

                    {{-- ==================== DATA IBU ==================== --}}
                    <h4 class="mb-3 mt-5 fw-bold text-primary">Data Ibu</h4>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_ibu" class="form-control" placeholder="Tempat Lahir">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_ibu" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pendidikan</label>
                            <input type="text" name="pendidikan_ibu" class="form-control" placeholder="Pendidikan">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Penghasilan</label>
                            <input type="number" name="penghasilan_ibu" class="form-control" placeholder="Penghasilan">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat_ibu" class="form-control" rows="2" placeholder="Alamat lengkap"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp_ibu" class="form-control" placeholder="No HP">
                        </div>

                    </div>

                    {{-- ==================== DATA WALI ==================== --}}
                    <h4 class="mb-3 mt-5 fw-bold text-primary">Data Wali (Opsional)</h4>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Nama Wali</label>
                            <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hubungan</label>
                            <input type="text" name="hubungan_wali" class="form-control"
                                placeholder="Hubungan (Paman, Kakak, dll)">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat_wali" class="form-control" rows="2" placeholder="Alamat lengkap"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp_wali" class="form-control" placeholder="No HP">
                        </div>

                    </div>

                    <div class="text-end mt-5">
                        <button type="submit" class="btn btn-primary px-4 py-2">Simpan Semua</button>
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
        /* Wrapper lebih lebar */
        .content-wrapper {
            margin-left: 260px !important;
            padding: 25px;
            width: calc(100% - 260px);
            /* FULL WIDTH */
            max-width: 100%;
        }

        /* Card dilebarkan */
        .card {
            width: 95%;
            /* Lebar 95% layar */
            margin-left: auto;
            margin-right: auto;
            /* Biarkan tetap center */
            border-radius: 14px;
            border: none;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }

        /* Header card */
        .card-header {
            background: linear-gradient(135deg, #2c5aa0, #1e3a8a);
            color: #fff;
            padding: 28px 35px;
        }

        /* Label */
        .form-label {
            font-weight: 600;
            color: #2c5aa0;
            margin-bottom: 6px;
        }

        /* Input */
        .form-control {
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #d5d9e0;
            width: 100%;
        }

        .form-control:focus {
            border-color: #2c5aa0;
            box-shadow: 0 0 0 0.15rem rgba(44, 90, 160, 0.25);
        }

        /* Grid agar benar-benar lebar */
        .row.g-3 {
            margin-left: 0;
            margin-right: 0;
        }

        .row.g-3>[class*='col-'] {
            padding-left: 12px;
            padding-right: 12px;
        }

        /* Tombol */
        .btn-primary {
            border-radius: 10px;
            border: none;
            padding: 13px 30px;
            background: linear-gradient(135deg, #2c5aa0, #1e3a8a);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1e3a8a, #2c5aa0);
            box-shadow: 0 5px 15px rgba(44, 90, 160, 0.3);
        }

        /* Info card full width juga */
        .info-card {
            width: 95%;
            margin-left: auto;
            margin-right: auto;
            padding: 22px;
            border-radius: 12px;
            background: #f7f9fc;
        }
    </style>
@endpush




