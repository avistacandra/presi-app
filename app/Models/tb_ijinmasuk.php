<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tb_ijinmasuk extends Model
{
    use HasFactory;

    public function gurupiket(): BelongsTo
    {
        return $this->belongsTo(tb_guru_piket::class);
    }
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(tb_siswa::class);
    }
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(tb_kelas::class);
    }


    protected $fillable = [
        'gurupiket_id',
        'siswa_id',
        'kelas_id',
        'jam_masuk',
        'tgl_ijinmasuk',
        'ket',
        'alasan'
    ];
    protected $table = 'tb_ijinmasuk';
    public $timestamps = false;

}
