<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_jadwalbelajar extends Model
{
    use HasFactory;

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(tb_kelas::class);
    }
    public function mapel(): BelongsTo
    {
        return $this->belongsTo(tb_mapel::class);
    }
    public function tahunajaran(): BelongsTo
    {
        return $this->belongsTo(tb_thn_ajaran::class);
    }
    public function semester(): BelongsTo
    {
        return $this->belongsTo(tb_semester::class);
    }
    public function guru(): BelongsTo
    {
        return $this->belongsTo(tb_guru::class);
    }
    public function presensimapel(): HasMany
    {
        return $this->hasMany(tb_presensi::class);
    }


    protected $fillable = [
        'guru_id',
        'mapel_id',
        'kelas_id',
        'hari',
        'jam_belajar',
        'semester_id',
        'tahunajaran_id'
    ];
    protected $table = 'tb_jadwalbelajar';
    public $timestamps = false;
}
