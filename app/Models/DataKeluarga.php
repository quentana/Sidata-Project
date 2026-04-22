<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataKeluarga extends Model
{
    use SoftDeletes;

    protected $table = 'data_keluargas';

    protected $fillable = [
        'user_id',
        'data_ayah_id',
        'data_ibu_id',
        'data_wali_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ayah()
    {
        return $this->belongsTo(DataAyah::class, 'data_ayah_id');
    }

    public function ibu()
    {
        return $this->belongsTo(DataIbu::class, 'data_ibu_id');
    }

    public function wali()
    {
        return $this->belongsTo(DataWali::class, 'data_wali_id');
    }
}

