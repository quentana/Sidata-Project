<?php

namespace App\Exports;

use App\Models\Rayon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RayonExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * Ambil semua data Rayon
    */
    public function collection()
    {
        return Rayon::all();
    }

    /**
     * Mapping data per baris
     */
    public function map($rayon): array
    {
        return [
            $rayon->id,
            $rayon->nama_rayon,
            $rayon->pembimbing,
            $rayon->created_at?->format('Y-m-d'),
        ];
    }

    /**
     * Judul kolom Excel
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Rayon',
            'Pembimbing',
            'Tanggal Dibuat',
        ];
    }
}
