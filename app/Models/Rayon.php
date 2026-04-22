<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rayon extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama_rayon', 'pembimbing'];

    public function siswas()
    {
        return $this->hasMany(DataSiswa::class);
    }
}
