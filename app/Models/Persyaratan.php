<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persyaratan extends Model
{
    use HasFactory;

    protected $fillable = ['layanan_id', 'nama', 'deskripsi', 'link_download'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
