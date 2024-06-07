<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalianAlat extends Model
{
    protected $table = 'peminjaman_alats';
    protected $guarded = ["id"];
}
