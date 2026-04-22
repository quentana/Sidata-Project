@extends('templates.app')

@section('content')
    <x-navbar></x-navbar>
    <div class="p-4 sm:ml-64" style="margin-left: 250px;
    padding: 20px;">
        <!-- Header & Navigation -->
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Diri</li>
                    </ol>
                </nav>

                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs" id="dataDiriTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#siswa"
                            type="button" role="tab" aria-controls="siswa" aria-selected="true">Siswa</button>

                </ul>
            </div>
        </div>
        <!-- Tab Content -->
        <div class="tab-content" id="dataDiriTabsContent">
            <!-- Tab Siswa -->
            <div class="tab-pane fade show active" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
                <div class="row">
                    <div class="col-12">
                        @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"
                                role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            @if ($data_siswas->isEmpty())
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Data Diri Siswa</h5>
                                    <a href="{{ route('user.datasiswas.create') }}" class="btn btn-primary mb-3">
                                        <i class="fas fa-plus"></i> Tambah Data
                                    </a>
                                </div>
                            @else 
                            @endif
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <small><i class="fas fa-info-circle me-1"></i> Lengkapi Data Jika Masih Kosong</small>
                                </div>

                                <!-- Table Data Siswa -->
                                <div class="table-responsive">
                                    <h3 class="mb-3">Data Siswa</h3>
                                    @forelse($data_siswas as $datasiswa)
                                        <table class="table table-bordered mb-4">
                                            <tr>
                                                <th>Nama</th>
                                                <td>{{ $datasiswa->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $datasiswa->Email }}</td>
                                            </tr>
                                            <tr>
                                                <th>NIS</th>
                                                <td>{{ $datasiswa->Nis }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jurusan</th>
                                                <td>{{ $datasiswa->jurusan->nama_jurusan ?? '-' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Rayon</th>
                                                <td>{{ $datasiswa->rayon->nama_rayon ?? '-' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Rombel</th>
                                                <td>{{ $datasiswa->romble->nama_romble ?? '-' }}</td>
                                            </tr>

                                            <tr>
                                                <th>No HP</th>
                                                <td>{{ $datasiswa->No_Hp }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>{{ $datasiswa->Jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td>{{ $datasiswa->Tanggal_Lahir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tempat Lahir</th>
                                                <td>{{ $datasiswa->Tempat_Lahir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tinggi Badan</th>
                                                <td>{{ $datasiswa->Tinggi_badan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Berat Badan</th>
                                                <td>{{ $datasiswa->Berat_badan }}</td>
                                            </tr>
                                            <tr>
                                                <th>No Ijazah SD</th>
                                                <td>{{ $datasiswa->No_Ijaza_Sd }}</td>
                                            </tr>
                                            <tr>
                                                <th>No Ijazah SMP</th>
                                                <td>{{ $datasiswa->No_Ijaza_Smp }}</td>
                                            </tr>
                                            <tr>
                                                <th>RT</th>
                                                <td>{{ $datasiswa->Rt }}</td>
                                            </tr>
                                            <tr>
                                                <th>RW</th>
                                                <td>{{ $datasiswa->Rw }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kelurahan</th>
                                                <td>{{ $datasiswa->Kelurahan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $datasiswa->Kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Provinsi</th>
                                                <td>{{ $datasiswa->Provinsi }}</td>
                                            </tr>
                                            <th>Aksi</th>
                                            <td>
                                                <a href="{{ route('user.datasiswas.edit', $datasiswa->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                {{-- <form action="{{ route('user.datasiswas.destroy', $datasiswa->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin hapus data ini?')">
                                                        Hapus
                                                    </button>
                                                </form> --}}
                                            </td>
                                        </table>
                                    @empty
                                        <div class="alert alert-info text-center">Belum ada data siswa</div>
                                    @endforelse


                                </div>
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

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
    </style>
@endsection
