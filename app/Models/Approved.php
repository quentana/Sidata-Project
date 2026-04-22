<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approved extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function datasiswa()
    {
        return $this->belongsTo(DataSiswa::class, 'user_id', 'user_id');
    }


    public function datakeluarga() {
        return $this->belongsTo(DataKeluarga::class);
    }
}
