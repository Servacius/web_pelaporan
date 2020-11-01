<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    protected $table = 'pelaporan';

    protected $fillable = [
        'user_id',
        'kategory_id',
        'lokasi_id',
        'divisi_id',
        'name',
        'slack_id',
        'deskripsi',
        'date',
        'image_path',
    ];
}
