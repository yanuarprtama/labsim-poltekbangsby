<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kritik extends Model
{
    protected $table = 'kritik';
    
    use HasFactory;

    protected $fillable = [
        'kritik',
        'saran'
    ];
}
