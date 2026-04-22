<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataWali extends Model
{
    use SoftDeletes;
    protected $table = 'data_walis';
    protected $fillable = [
        'user_id',
        'nama_wali',
        'hubungan_wali',
        'alamat_wali',
        'no_hp_wali',
    ];

    public function User()
    {
        return $this->belongsTo( User::class);
    }

    public function keluarga()
    {
        return $this->hasOne(DataKeluarga::class, 'wali_id');
    }
}
