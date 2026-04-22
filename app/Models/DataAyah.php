<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataAyah extends Model
{
    use SoftDeletes;

    protected $table = 'data_ayahs';
    protected $fillable =[
        'user_id',
        'nama_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'alamat_ayah',
        'no_hp_ayah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function keluarga()
    {
        return $this->hasOne(DataKeluarga::class, 'ayah_id');
    }
}
