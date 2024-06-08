<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administratorModel extends Model
{
    protected $table = "users";
    protected $guarded = ["id"];
}
