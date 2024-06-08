<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjamanLabModel extends Model
{
    protected $table = 'peminjamanlabs';
    protected $guarded = ["id"];
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
