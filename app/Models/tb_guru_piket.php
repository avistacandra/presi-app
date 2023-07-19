<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_guru_piket extends Model
{
    use HasFactory;

    public function ijinkeluar(): HasMany
    {
        return $this->hasMany(tb_ijinkeluar::class);
    }
    public function ijinmasuk(): HasMany
    {
        return $this->hasMany(tb_ijinmasuk::class);
    }

    protected $fillable = [
        'nm_gp',
        'je_kel'
    ];
    protected $table = 'tb_guru_piket';
    public $timestamps = false;
}
