<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';

    protected $fillable = [
        'id',
        'nama_divisi',
        'created_at',
        'updated_at',
    ];
}
