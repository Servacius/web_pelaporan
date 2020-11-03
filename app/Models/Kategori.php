<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategory_pelaporan';

    protected $fillable = [
        'id',
        'nama_kategori',
        'created_at',
        'updated_at',
    ];
}
