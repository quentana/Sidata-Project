<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataSiswa extends Model
{
    use SoftDeletes;

    protected $table = 'data_siswas';

    protected $fillable = [
        'name',
        'Tanggal_Lahir',
        'Tempat_Lahir',
        'No_Hp',
        'Nis',
        'Email',
        'Tinggi_badan',
        'Berat_badan',
        'No_Ijaza_Sd',
        'No_Ijaza_Smp',
        'Rt',
        'Rw',
        'Kelurahan',
        'Kecamatan',
        'Provinsi',
        'Jenis_kelamin',
        'user_id',
        'jurusan_id',
        'rayon_id',
        'romble_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    public function romble()
    {
        return $this->belongsTo(Romble::class); 
    }
    public function keluarga()
    {
        return $this->hasOne(DataKeluarga::class, 'user_id', 'user_id');
    }

    // relasi ke dokumen
    public function document()
    {
        return $this->hasOne(Document::class, 'user_id', 'user_id');
    }



}
