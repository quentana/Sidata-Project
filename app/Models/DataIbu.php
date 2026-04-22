<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataIbu extends Model
{
    use SoftDeletes;
    protected $table = 'data_ibus';
    protected $fillable = [
        'user_id',
        'nama_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'alamat_ibu',
        'no_hp_ibu',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function keluarga()
    {
        return $this->hasOne(DataKeluarga::class, 'ibu_id');
    }
}
