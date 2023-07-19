<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tb_presensi extends Model
{
    use HasFactory;

    public function jadwalbelajar():BelongsTo
    {
        return $this->belongsTo(tb_jadwalbelajar::class);
    }
    public function siswa():BelongsTo
    {
        return $this->belongsTo(tb_siswa::class);
    }
    public function mapel():BelongsTo
    {
        return $this->belongsTo(tb_mapel::class);
    }
    public function kelas():BelongsTo
    {
        return $this->belongsTo(tb_kelas::class);
    }
    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'mapel_id',
        'jadwalbelajar_id',
        'ket_presensi',
        'pertemuan_ke',
        'tgl_absen'
    ];

    protected $table = 'tb_presensi';
}