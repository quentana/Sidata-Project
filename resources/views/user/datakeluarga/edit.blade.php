@extends('templates.app')

@section('content')
    <x-navbar></x-navbar>
    <div class="p-4 sm:ml-64 " style="margin-left: 250px; padding: 20px;">

        <!-- Breadcrumb -->
        <div class="d-flex align-items-center mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('user.datakeluargas.index') }}" class="text-secondary text-decoration-none">Data Keluarga</a></li>
                    <li class="breadcrumb-item active text-dark fw-semibold">Edit Data</li>
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
                        <i class="fas fa-edit fa-lg text-white"></i>
                    </div>
                    <h5 class="mb-0">Edit Data Keluarga</h5>
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

                <form action="{{ route('user.datakeluargas.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- ==================== DATA AYAH ==================== --}}
                    <h4 class="mb-3 mt-4 fw-bold text-primary">Data Ayah</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" value="{{ old('nama_ayah', $data_ayahs->nama_ayah) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_ayah" class="form-control" placeholder="Tempat Lahir" value="{{ old('tempat_lahir_ayah', $data_ayahs->tempat_lahir_ayah ?? '') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_ayah" class="form-control" value="{{ old('tanggal_lahir_ayah', $data_ayahs->tanggal_lahir_ayah ??'') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pendidikan</label>
                            <input type="text" name="pendidikan_ayah" class="form-control" placeholder="Pendidikan" value="{{ old('pendidikan_ayah', $data_ayahs->pendidikan_ayah ??'') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan" value="{{ old('pekerjaan_ayah', $data_ayahs->pekerjaan_ayah ??'') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Penghasilan</label>
                            <input type="number" name="penghasilan_ayah" class="form-control" placeholder="Penghasilan" value="{{ old('penghasilan_ayah', $data_ayahs->penghasilan_ayah ?? '') }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat_ayah" class="form-control" rows="2"
                            placeholder="Alamat lengkap">{{ old('alamat_ayah', $data_ayahs->alamat_ayah ??'') }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp_ayah" class="form-control" placeholder="No HP" value="{{ old('no_hp-ayah', $data_ayahs->no_hp_ayah ??'') }}">
                        </div>
                    </div>

                    {{-- ==================== DATA IBU ==================== --}}
                    <h4 class="mb-3 mt-5 fw-bold text-primary">Data Ibu</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value="{{ old('nama_ibu', $data_ibus->nama_ibu ??'') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_ibu" class="form-control" placeholder="Tempat Lahir" value="{{ old('tempat_lahir_ibu', $data_ibus->tempat_lahir_ibu ??'') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_ibu" class="form-control" value="{{ old('tanggal_lahir_ibu', $data_ibus->tanggal_lahir_ibu ??'') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pendidikan</label>
                            <input type="text" name="pendidikan_ibu" class="form-control" placeholder="Pendidikan" value="{{ old('pendidikan_ibu', $data_ibus->pendidikan_ibu ??'') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan" value="{{ old('pekerjaan_ibu', $data_ibus->pekerjaan_ibu ??'') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Penghasilan</label>
                            <input type="number" name="penghasilan_ibu" class="form-control" placeholder="Penghasilan" value="{{ old('penghasilan_ibu', $data_ibus->penghasilan_ibu ??'') }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat_ibu" class="form-control" rows="2" placeholder="Alamat lengkap">{{ old('alamat_ibu', $data_ibus->alamat_ibu??'') }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp_ibu" class="form-control" placeholder="No HP" value="{{ old('no_hp_ibu', $data_ibus->no_hp_ibu ??'') }}">
                        </div>
                    </div>
                       <h4 class="mb-3 mt-5 fw-bold text-primary">Data Wali</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Wali</label>
                            <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali" value="{{ old('nama_wali', $data_walis->nama_wali ??'') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hubungan</label>
                            <input type="text" name="hubungan_wali" class="form-control"
                                placeholder="Hubungan (Paman, Kakak, dll)"value="{{ old('hubungan_wali', $data_walis->hubungan_wali ??'') }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat_wali" class="form-control" rows="2" placeholder="Alamat lengkap" value=""{{ old('alamat_wali',$data_walis->alamat_wali ??'') }}></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp_wali" class="form-control" placeholder="No HP" value="{{ old('no_hp_wali',$data_walis->no_hp_wali??'') }}">
                        </div>
                    </div>

                    <div class="text-end mt-5">
                        <button type="submit" class="btn btn-primary px-4 py-2">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
