<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_mapel extends Model
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

    protected $fillable = ['nm_mapel'];
    protected $table = 'tb_mapel';
    public $timetamps = false;
}
