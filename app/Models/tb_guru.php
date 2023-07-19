<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_guru extends Model
{
    use HasFactory;

    public function jadwalbelajar(): HasMany
    {
        return $this->hasMany(tb_jadwalbelajar::class);
    }
    public function presensimapel(): HasMany
    {
        return $this->hasMany(tb_presensi::class);
    }

    protected $fillable = [
        'nip',
        'nm_guru',
        'je_kel',
        'golongan',
        'tgs_tambahan'
    ];
    protected $table = 'tb_guru';
    public $timestamps = false;

}
