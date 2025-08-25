<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyaratKhusus extends Model
{
     protected $table = 'syarat_khusus';
     protected $fillable = ['layanan_id', 'nama', 'deskripsi', 'link_download'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
