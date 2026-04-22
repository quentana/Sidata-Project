<?php

namespace App\Exports;

use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class JurusanExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Jurusan::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Jurusan',
            'Kode Jurusan',
        ];
    }

    public function map($jurusan): array
    {
        static $no = 1;

        return [
            $no++,
            $jurusan->nama_jurusan,
            $jurusan->kode_jurusan,
        ];
    }
}
