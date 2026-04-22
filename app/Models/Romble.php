<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Romble extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rombles';

    protected $fillable = ['nama_romble', 'tingkat'];

    public function siswas()
    {
        return $this->hasMany(DataSiswa::class);
    }
}
