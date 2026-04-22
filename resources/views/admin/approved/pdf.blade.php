<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .section-title {
            background: #ddd;
            padding: 5px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 5px;
            vertical-align: top;
        }
    </style>
</head>

<body>

    <h2>Detail Data Siswa</h2>

    @php $ds = $data->datasiswa; @endphp

    <div class="section-title">Data Siswa</div>
    <table border="1">
        <tr>
            <td>Nama</td>
            <td>{{ $ds->name }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>{{ $ds->Tanggal_Lahir }}</td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>{{ $ds->Tempat_Lahir }}</td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td>{{ $ds->Tinggi_badan }}</td>
        </tr>
        <tr>
            <td>Berat Badan</td>
            <td>{{ $ds->Berat_badan }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>{{ $ds->No_Hp }}</td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>{{ $ds->Nis }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $ds->Email }}</td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>{{ $ds->jurusan->nama_jurusan ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Data Keluarga</div>
    @php
        $ayah = $ds->keluarga->ayah ?? null;
        $ibu = $ds->keluarga->ibu ?? null;
        $wali = $ds->keluaga->wali ?? null;

        // Cek apakah ada data sama sekali
        $hasData = ($ayah && $ayah->nama_ayah) || ($ibu && $ibu->nama_ibu) || ($wali && $wali->nama_wali);
    @endphp

    @if ($hasData)
        <table border="1">

            {{-- ================= AYAH ================= --}}
            @if ($ayah)
                <tr>
                    <td>Nama Ayah</td>
                    <td>{{ $ayah->nama_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>{{ $ayah->tempat_lahir_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $ayah->tanggal_lahir_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td>{{ $ayah->pendidikan_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>{{ $ayah->pekerjaan_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td>{{ $ayah->no_hp_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $ayah->alamat_ayah ?? '-' }}</td>
                </tr>
            @endif

            {{-- ================= IBU ================= --}}
            @if ($ibu)
                <tr>
                    <td>Nama Ibu</td>
                    <td>{{ $ibu->nama_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>{{ $ibu->tempat_lahir_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $ibu->tanggal_lahir_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td>{{ $ibu->pendidikan_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>{{ $ibu->pekerjaan_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td>{{ $ibu->no_hp_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $ibu->alamat_ibu ?? '-' }}</td>
                </tr>
            @endif

            {{-- ================= WALI ================= --}}
            @if ($wali)
                <tr>
                    <td>Nama Wali</td>
                    <td>{{ $wali->nama_wali ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td>{{ $wali->no_hp_wali ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Hubungan</td>
                    <td>{{ $wali->hubungan_wali ?? '-' }}</td>
                </tr>
            @endif

        </table>
    @endif


    <div class="section-title">Dokumen</div>
    @if ($ds->document)
        @if ($ds->document->akte_Kelahiran)
            <p><strong>Akte Kelahiran:</strong></p>
            <img src="{{ public_path('storage/' . $ds->document->akte_Kelahiran) }}" width="300">
        @endif
    @endif
    @if ($ds->document)
        @if ($ds->document->kartu_Keluarga)
            <p><strong>Kartu Keluarga:</strong></p>
            <img src="{{ public_path('storage/' . $ds->document->kartu_Keluarga) }}" width="300">
            </div>
        @endif
    @endif
    @if ($ds->document)
        @if ($ds->document->KTP_ayah)
            <p><strong>KTP Ayah:</strong></p>
            <img src="{{ public_path('storage/' . $ds->document->KTP_ayah) }}" width="300">
            </div>
        @endif
    @endif
    @if ($ds->document)
        @if ($ds->document->KTP_Ibu)
            <p><strong>KTP Ibu:</strong></p>
            <img src="{{ public_path('storage/' . $ds->document->KTP_Ibu) }}" width="300">
        @endif
    @endif
</body>

</html>
