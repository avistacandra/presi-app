<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_kelas extends Model
{
    use HasFactory;

    public function siswa(): HasMany
    {
        return $this->hasMany(tb_siswa::class);
    }
    public function jadwalbelajar(): HasMany
    {
        return $this->hasMany(tb_jadwalbelajar::class);
    }
    public function presensimapel(): HasMany
    {
        return $this->hasMany(tb_presensi::class);
    }
    public function ijinkeluar(): HasMany
    {
        return $this->hasMany(tb_ijinkeluar::class);
    }
    public function ijinmasuk(): HasMany
    {
        return $this->hasMany(tb_ijinmasuk::class);
    }
    // protected $guarded= [];
    protected $fillable = ['id', 'nm_kelas'];
    protected $table = 'tb_kelas';
}
