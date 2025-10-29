<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriPamflet extends Model
{
    use HasFactory;

    protected $table = 'galeri_pamflet';

    protected $fillable = [
        'title',
        'status',
        'tanggal',
        'gambar',
    ];
}
