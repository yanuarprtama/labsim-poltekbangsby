<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class laporanKerusakan extends Model
{
    protected $table = 'laporan_kerusakans';
    protected $guarded = ["id"];
}
