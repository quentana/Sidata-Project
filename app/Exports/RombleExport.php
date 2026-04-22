<?php

namespace App\Exports;

use App\Models\Romble;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RombleExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Romble::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Rombel',
            'Tingkatan',
        ];
    }

    public function map($romble): array
    {
        static $no = 1;

        return [
            $no++,
            $romble->nama_romble,
            $romble->tingkat,
        ];
    }
}
