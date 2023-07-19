<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_thn_ajaran extends Model
{
    use HasFactory;

    public function jadwalbelajar(): HasMany
    {
        return $this->hasMany(tb_jadwalbelajar::class);
    }

    protected $fillable = [
        'thn_ajaran',
        'status_ta'
    ];
    protected $table = 'tb_thn_ajaran';
    public $timestamps = false;
}
