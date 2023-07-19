<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_semester extends Model
{
    use HasFactory;

    public function jadwalbelajar():HasMany
    {
        return $this->hasMany(tb_jadwalbelajar::class);
    }

    
    protected $fillable = [
        'semester',
        'status_sem'
    ];
    protected $table = 'tb_semester';
    public $timestamps = false;
}
