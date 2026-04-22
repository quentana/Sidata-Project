@extends('templates.app')

@section('content')
    <x-navbar></x-navbar>
    <div class="p-4 sm:ml-64" style="margin-left: 250px; padding: 20px;">
        <!-- Header & Navigation -->
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.datasiswas.index') }}">Data Diri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
                    </ol>
                </nav>

                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs" id="dataDiriTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#siswa" type="button"
                            role="tab" aria-controls="siswa" aria-selected="false">Siswa</button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="keluarga-tab" data-bs-toggle="tab" data-bs-target="#keluarga"
                            type="button" role="tab" aria-controls="keluarga" aria-selected="false">Keluarga</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dokumen-tab" data-bs-toggle="tab" data-bs-target="#dokumen"
                            type="button" role="tab" aria-controls="dokumen" aria-selected="false">Dokumen</button>
                    </li> --}}

                </ul>
            </div>
        </div>

        <!-- Alert Data Belum Lengkap -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <div>
                        <strong>Data Belum Lengkap!</strong> Segera Lengkapi Data Anda.
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="dataDiriTabsContent">
            <!-- Tab Siswa -->
            <div class="tab-pane fade show active" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Tambah Data Diri Siswa</h5>
                                <a href="{{ route('user.datasiswas.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Data Siswa
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <small><i class="fas fa-info-circle me-1"></i> Lengkapi semua data dengan benar</small>
                                </div>

                                <!-- Form Tambah Data Siswa -->
                                <form action="{{ route('user.datasiswas.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('Email') is-invalid @enderror"
                                                id="Email" name="Email" value="{{ old('Email') }}" required>
                                            @error('Email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Nis" class="form-label">NIS</label>
                                            <input type="text" class="form-control @error('Nis') is-invalid @enderror"
                                                id="Nis" name="Nis" value="{{ old('Nis') }}" required>
                                            @error('Nis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="No_Hp" class="form-label">No HP</label>
                                            <input type="text" class="form-control @error('No_Hp') is-invalid @enderror"
                                                id="No_Hp" name="No_Hp" value="{{ old('No_Hp') }}" required>
                                            @error('No_Hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Tempat_Lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text"
                                                class="form-control @error('Tempat_Lahir') is-invalid @enderror"
                                                id="Tempat_Lahir" name="Tempat_Lahir" value="{{ old('Tempat_Lahir') }}"
                                                required>
                                            @error('Tempat_Lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Tanggal_Lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('Tanggal_Lahir') is-invalid @enderror"
                                                id="Tanggal_Lahir" name="Tanggal_Lahir"
                                                value="{{ old('Tanggal_Lahir') }}" required>
                                            @error('Tanggal_Lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Tinggi_badan" class="form-label">Tinggi Badan</label>
                                            <input type="text"
                                                class="form-control @error('Tinggi_badan') is-invalid @enderror"
                                                id="Tinggi_badan" name="Tinggi_badan" value="{{ old('Tinggi_badan') }}"
                                                required>
                                            @error('Tinggi_badan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Berat_badan" class="form-label">Berat Badan</label>
                                            <input type="text"
                                                class="form-control @error('Berat_badan') is-invalid @enderror"
                                                id="Berat_badan" name="Berat_badan" value="{{ old('Berat_badan') }}"
                                                required>
                                            @error('Berat_badan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="No_Ijazah_Sd" class="form-label">No Ijazah Sd</label>
                                            <input type="text"
                                                class="form-control @error('No_Ijaza_Sd') is-invalid @enderror"
                                                id="No_Ijaza_Sd" name="No_Ijaza_Sd" value="{{ old('No_Ijaza_Sd') }}"
                                                required>
                                            @error('No_Ijaza_Sd')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="No_Ijazah_Smp" class="form-label">No Ijazah Smp</label>
                                            <input type="text"
                                                class="form-control @error('No_Ijaza_Smp') is-invalid @enderror"
                                                id="No_Ijaza_Smp" name="No_Ijaza_Smp" value="{{ old('No_Ijaza_Smp') }}"
                                                required>
                                            @error('No_Ijaza_Smp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Rt" class="form-label">RT</label>
                                            <input type="text" class="form-control @error('Rt') is-invalid @enderror"
                                                id="Rt" name="Rt" value="{{ old('Rt') }}" required>
                                            @error('Rt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Rw" class="form-label">RW</label>
                                            <input type="text" class="form-control @error('Rw') is-invalid @enderror"
                                                id="Rw" name="Rw" value="{{ old('Rw') }}" required>
                                            @error('Rw')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Kelurahan" class="form-label">Kelurahan</label>
                                            <input type="text"
                                                class="form-control @error('Kelurahan') is-invalid @enderror"
                                                id="Kelurahan" name="Kelurahan" value="{{ old('Kelurahan') }}" required>
                                            @error('Kelurahan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Kecamatan" class="form-label">Kecamatan</label>
                                            <input type="text"
                                                class="form-control @error('Kecamatan') is-invalid @enderror"
                                                id="Kecamatan" name="Kecamatan" value="{{ old('Kecamatan') }}" required>
                                            @error('Kecamatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Provinsi" class="form-label">Provinsi</label>
                                            <input type="text"
                                                class="form-control @error('Provinsi') is-invalid @enderror"
                                                id="Provinsi" name="Provinsi" value="{{ old('Provinsi') }}" required>
                                            @error('Provinsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label for="Jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select @error('Jenis_kelamin') is-invalid @enderror"
                                                id="Jenis_kelamin" name="Jenis_kelamin" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-laki"
                                                    {{ old('Jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ old('Jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                            @error('Jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label>Jurusan</label>
                                            <select name="jurusan_id" class="form-control" required>
                                                <option value="">-- Pilih Jurusan --</option>
                                                @foreach ($jurusans as $j)
                                                    <option value="{{ $j->id }}">
                                                        {{ $j->nama_jurusan }} ({{ $j->kode_jurusan }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label>Rayon</label>
                                            <select name="rayon_id" class="form-control" required>
                                                <option value="">-- Pilih Rayon --</option>
                                                @foreach ($rayons as $r)
                                                    <option value="{{ $r->id }}">
                                                        {{ $r->nama_rayon }}({{ $r->pembimbing}})</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label>Rombel</label>
                                            <select name="romble_id" class="form-control" required>
                                                <option value="">-- Pilih Rombel --</option>
                                                @foreach ($rombles as $rb)
                                                    <option value="{{ $rb->id }}">
                                                        {{ $rb->nama_romble }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save me-1"></i> Simpan Data
                                            </button>
                                            <a href="{{ route('user.datasiswas.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-times me-1"></i> Batal
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Keluarga -->
            <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Data Keluarga</h5>
                            </div>
                            <div class="card-body">
                                <p>Data keluarga akan ditampilkan di sini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Dokumen -->
            <div class="tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Dokumen</h5>
                            </div>
                            <div class="card-body">
                                <p>Dokumen akan ditampilkan di sini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Script untuk navigasi tabs
        document.addEventListener('DOMContentLoaded', function() {
            // Nonaktifkan klik pada tab lain saat di halaman create
            const tabs = document.querySelectorAll('.nav-tabs .nav-link');
            tabs.forEach(tab => {
                if (!tab.classList.contains('active')) {
                    tab.style.pointerEvents = 'none';
                    tab.style.opacity = '0.6';
                }
            });
        });
    </script>
@endsection

@section('styles')
    <style>
        .nav-tabs .nav-link {
            color: #6c757d;
            font-weight: 500;
        }

        .nav-tabs .nav-link.active {
            color: #0d6efd;
            font-weight: 600;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .btn {
            border-radius: 0.375rem;
        }
    </style>
@endsection
