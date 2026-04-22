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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Keluarga</li>
                    </ol>
                </nav>

                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs" id="dataDiriTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#siswa"
                            type="button" role="tab" aria-controls="siswa" aria-selected="true">Data Keluarga</button>
                </ul>
            </div>
        </div>


         @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ Session::get('success') }}
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <!-- Tab Content -->
        <div class="tab-content" id="dataDiriTabsContent">
            <!-- Tab Siswa -->
            <div class="tab-pane fade show active" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if ($data_ayah_id->count() == 0 && $data_ibu_id->count() == 0 && $data_wali_id->count() == 0)
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Data Keluarga</h5>
                                    {{-- <a href="{{ route('admin.jurusans.trash') }}" class="btn btn-secondary me-2"> Data
                                    Sampah</a> --}}
                                    {{-- <a href="{{ route('user.datakeluargas.export') }}" class="btn btn-secondary me-2">Export
                                    (.xlsx)</a> --}}
                                    <a href="{{ route('user.datakeluargas.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i> Tambah Data Keluarga
                                    </a>
                                </div>
                            @else
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Data Keluarga</h5>
                                    {{-- <a href="{{ route('admin.jurusans.trash') }}" class="btn btn-secondary me-2"> Data
                                    Sampah</a> --}}
                                    {{-- <a href="{{ route('user.datakeluargas.export') }}" class="btn btn-secondary me-2">Export
                                    (.xlsx)</a> --}}
                                </div>
                            @endif
                            <div class="card-body">

                                {{-- ================ DATA AYAH ================ --}}
                                <h4>Data Ayah</h4>
                                @forelse($data_ayah_id as $ayah)
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <th>Nama Ayah</th>
                                            <td>{{ $ayah->nama_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td>{{ $ayah->tempat_lahir_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td>{{ $ayah->tanggal_lahir_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan</th>
                                            <td>{{ $ayah->pendidikan_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan</th>
                                            <td>{{ $ayah->pekerjaan_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>No HP</th>
                                            <td>{{ $ayah->no_hp_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $ayah->alamat_ayah }}</td>
                                        </tr>
                                    </table>
                                @empty
                                    <div class="alert alert-info text-center">Belum ada data ayah</div>
                                @endforelse

                                <hr>

                                {{-- ================ DATA IBU ================ --}}
                                <h4>Data Ibu</h4>
                                @forelse($data_ibu_id as $ibu)
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <th>Nama Ibu</th>
                                            <td>{{ $ibu->nama_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td>{{ $ibu->tempat_lahir_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td>{{ $ibu->tanggal_lahir_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan</th>
                                            <td>{{ $ibu->pendidikan_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan</th>
                                            <td>{{ $ibu->pekerjaan_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>No HP</th>
                                            <td>{{ $ibu->no_hp_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $ibu->alamat_ibu }}</td>
                                        </tr>
                                    </table>
                                @empty
                                    <div class="alert alert-info text-center">Belum ada data ibu</div>
                                @endforelse

                                <hr>
                                {{-- ================ DATA WALI ================ --}}
                                @if ($data_wali_id->count() > 0)
                                    <h4>Data Wali</h4>

                                    @foreach ($data_wali_id as $wali)
                                        <table class="table table-bordered mb-4">
                                            <tr>
                                                <th>Nama Wali</th>
                                                <td>{{ $wali->nama_wali }}</td>
                                            </tr>
                                            <tr>
                                                <th>No HP</th>
                                                <td>{{ $wali->no_hp_wali }}</td>
                                            </tr>
                                            <tr>
                                                <th>Hubungan</th>
                                                <td>{{ $wali->hubungan_wali }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $wali->alamat_wali }}</td>
                                            </tr>
                                        </table>
                                    @endforeach
                                @endif

                                <hr>

                                {{-- ================ AKSI UNTUK KESELURUHAN DATA KELUARGA ================ --}}
                                <div class="text-center">
                                    <a href="{{ route('user.datakeluargas.edit') }}" class="btn btn-warning btn-sm">Edit
                                        Semua</a>

                                    {{-- <form action="{{ route('user.datakeluargas.destroy') }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus seluruh data keluarga ini?')">
                                            Hapus Semua
                                        </button>
                                    </form> --}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>


    @push('scripts')
        <script>
            // Fungsi untuk mengisi form edit dengan data siswa
            document.getElementById('editSiswaModal').addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');

                // Ambil data siswa berdasarkan ID (contoh menggunakan AJAX)
                fetch(`/siswa/${id}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('edit_nis').value = data.nis;
                        document.getElementById('edit_nisn').value = data.nisn;
                        document.getElementById('edit_nama_lengkap').value = data.nama_lengkap;
                        document.getElementById('edit_email').value = data.email;
                        document.getElementById('edit_no_hp').value = data.no_hp;
                        document.getElementById('edit_tempat_lahir').value = data.tempat_lahir;
                        document.getElementById('edit_tanggal_lahir').value = data.tanggal_lahir;
                        document.getElementById('edit_jenis_kelamin').value = data.jenis_kelamin;
                        document.getElementById('edit_rombel').value = data.rombel;
                        document.getElementById('edit_rayon').value = data.rayon;
                        document.getElementById('edit_agama').value = data.agama;

                        // Set form action untuk update
                        document.getElementById('editSiswaForm').action = `/siswa/${id}`;
                    });
            });

            // Fungsi untuk menghapus data siswa
            
        </script>
    @endpush


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
