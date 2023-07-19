<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_siswa extends Model
{
    use HasFactory;

    public function kelas():BelongsTo
    {
        return $this->belongsTo(tb_kelas::class);
    }
    public function ijinkeluar(): HasMany
    {
        return $this->hasMany(tb_ijinkeluar::class);
    }
    public function presensimapel():HasMany
    {
        return $this->hasMany(tb_presensi::class);
    }
    public function ijinmasuk(): HasMany
    {
        return $this->hasMany(tb_ijinmasuk::class);
    }

    // protected $guarded = [];
    protected $fillable = [
        'nis',
        'nm_siswa',
        'kelas_id',
        'jns_kelamin'
    ];
    protected $table = 'tb_siswa';
    public $timestamps = false;
}
