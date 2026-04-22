@extends('templates.app')

@section('content')
    <x-navbar></x-navbar>
    <div class="p-4 sm:ml-64" style="margin-left: 250px; padding: 20px;">

        <div class="card-header d-flex align-items-center">
            <a href="{{ route('admin.approve.index') }}" class="btn btn-outline-primary mb-3 ms-auto">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>

            <a href="{{ route('admin.approve.export.pdf', $data->id) }}" class="btn btn-primary mb-3">
                <i class="fas fa-file-pdf me-2"></i> Unduh PDF
            </a>

        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h3 class="mb-4">Detail Data Siswa</h3>

                @php
                    $ds = $data->datasiswa;
                @endphp

                <!-- DATA SISWA -->
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <strong>Data Siswa</strong>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nama:</strong> {{ $ds->name ??'-'}}</li>
                            <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{ $ds->Tanggal_Lahir ??'-'}}</li>
                            <li class="list-group-item"><strong>Tempat Lahir:</strong> {{ $ds->Tempat_Lahir ??'-'}}</li>
                            <li class="list-group-item"><strong>Tinggi Badan:</strong> {{ $ds->Tinggi_badan ??'-'}}</li>
                            <li class="list-group-item"><strong>Berat Badan:</strong> {{ $ds->Berat_badan ??'-'}}</li>
                            <li class="list-group-item"><strong>No HP:</strong> {{ $ds->No_Hp ??'-'}}</li>
                            <li class="list-group-item"><strong>NIS:</strong> {{ $ds->Nis ??'-'}}</li>
                            <li class="list-group-item"><strong>No Ijaza SD:</strong> {{ $ds->No_Ijaza_Sd ??'-'}}</li>
                            <li class="list-group-item"><strong>No Ijaza SMP:</strong> {{ $ds->No_Ijaza_Smp ??'-'}}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $ds->Email ?? '-' }}</li>
                            <li class="list-group-item"><strong>Jurusan:</strong> {{ $ds->jurusan->nama_jurusan ?? '-' }}
                            </li>
                            <li class="list-group-item"><strong>Rayon:</strong> {{ $ds->rayon->nama_rayon ?? '-' }}</li>
                            <li class="list-group-item"><strong>Rombel:</strong> {{ $ds->romble->nama_romble ?? '-' }}</li>
                            <li class="list-group-item">
                                <strong>Alamat:</strong>
                                RT {{ $ds->Rt ??'-' }}, RW {{ $ds->Rw ??'-'}},
                                Kel. {{ $ds->Kelurahan ??'-'}}, Kec. {{ $ds->Kecamatan ??'-'}},
                                Prov. {{ $ds->Provinsi ??'- '}}
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- DATA KELUARGA -->
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-info text-white">
                        <strong>Data Keluarga</strong>
                    </div>
                    @php
                        $ayah = $ds->keluarga->ayah ?? null;
                        $ibu = $ds->keluarga->ibu ?? null;
                        $wali = $ds->keluarga->wali ?? null;

                        // CEK apakah minimal satu ada datanya
                        $hasKeluarga =
                            ($ayah && ($ayah->nama_ayah || $ayah->no_hp_ayah)) ||
                            ($ibu && ($ibu->nama_ibu || $ibu->no_hp_ibu)) ||
                            ($wali && ($wali->nama_wali || $wali->no_hp_wali));
                    @endphp

                    @if ($hasKeluarga)
                        <div class="card-body">
                            <ul class="list-group list-group-flush">

                                {{-- ================= AYAH ================= --}}
                                @if ($ayah)
                                    <li class="list-group-item"><strong>Nama Ayah:</strong> {{ $ayah->nama_ayah ?? '-' }}
                                    </li>
                                    <li class="list-group-item"><strong>Tempat Lahir:</strong>
                                        {{ $ayah->tempat_lahir_ayah ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tanggal Lahir:</strong>
                                        {{ $ayah->tanggal_lahir_ayah ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Pendidikan:</strong>
                                        {{ $ayah->pendidikan_ayah ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Pekerjaan Ayah:</strong>
                                        {{ $ayah->pekerjaan_ayah ?? '-' }}</li>
                                    <li class="list-group-item"><strong>No HP:</strong> {{ $ayah->no_hp_ayah ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Alamat:</strong> {{ $ayah->alamat_ayah ?? '-' }}
                                    </li>
                                    <br>
                                @endif

                                {{-- ================= IBU ================= --}}
                                @if ($ibu)
                                    <li class="list-group-item"><strong>Nama Ibu:</strong> {{ $ibu->nama_ibu ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tempat Lahir:</strong>
                                        {{ $ibu->tempat_lahir_ibu ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tanggal Lahir:</strong>
                                        {{ $ibu->tanggal_lahir_ibu ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Pendidikan:</strong>
                                        {{ $ibu->pendidikan_ibu ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Pekerjaan Ibu:</strong>
                                        {{ $ibu->pekerjaan_ibu ?? '-' }}</li>
                                    <li class="list-group-item"><strong>No HP:</strong> {{ $ibu->no_hp_ibu ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Alamat:</strong> {{ $ibu->alamat_ibu ?? '-' }}</li>
                                    <br>
                                @endif

                                {{-- ================= WALI ================= --}}
                                @if ($wali)
                                    <li class="list-group-item"><strong>Nama Wali:</strong> {{ $wali->nama_wali ?? '-' }}
                                    </li>
                                    <li class="list-group-item"><strong>No HP:</strong> {{ $wali->no_hp_wali ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Hubungan:</strong>
                                        {{ $wali->hubungan_wali ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Alamat:</strong> {{ $wali->alamat_wali ?? '-' }}
                                    </li>
                                @endif

                            </ul>
                        </div>
                    @endif

                </div>

                <!-- DOKUMEN -->
              <!-- ================= DOKUMEN ================= -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-warning text-dark">
        <strong>Dokumen</strong>
    </div>

    <div class="card-body">

        @if ($ds?->document)

            @if ($ds?->document?->akte_Kelahiran)
                <div class="mb-3">
                    <strong>Akte Kelahiran:</strong><br>
                    <img src="{{ asset('storage/' . $ds->document->akte_Kelahiran) }}"
                         class="img-thumbnail mt-2" width="300">
                </div>
            @endif

            @if ($ds?->document?->kartu_Keluarga)
                <div class="mb-3">
                    <strong>Kartu Keluarga:</strong><br>
                    <img src="{{ asset('storage/' . $ds->document->kartu_Keluarga) }}"
                         class="img-thumbnail mt-2" width="300">
                </div>
            @endif

            @if ($ds?->document?->KTP_ayah)
                <div class="mb-3">
                    <strong>KTP Ayah:</strong><br>
                    <img src="{{ asset('storage/' . $ds->document->KTP_ayah) }}"
                         class="img-thumbnail mt-2" width="300">
                </div>
            @endif

            @if ($ds?->document?->KTP_Ibu)
                <div class="mb-3">
                    <strong>KTP Ibu:</strong><br>
                    <img src="{{ asset('storage/' . $ds->document->KTP_Ibu) }}"
                         class="img-thumbnail mt-2" width="300">
                </div>
            @endif

        @else
            <p class="text-danger mb-0">Dokumen belum diupload.</p>
        @endif

    </div>
</div>


            </div>
        </div>




        <hr>

        <div class="d-flex gap-2">
            <form method="POST" action="{{ route('admin.approve.approve', $data->id) }}">
                @csrf @method('PUT')
                <button class="btn btn-success">Terima</button>
            </form>

            <form method="POST" action="{{ route('admin.approve.reject', $data->id) }}">
                @csrf @method('PUT')
                <button class="btn btn-danger">Tolak</button>
            </form>
        </div>

    </div>
@endsection
