<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class alatModel extends Model
{
    protected $table = 'alats';
    protected $guarded = ["id"];
    public function laporan_kerusakans(): HasMany
    {
        return $this->hasMany(LaporanKerusakan::class, 'kode_item', 'kode');
    }
}
