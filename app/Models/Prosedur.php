<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prosedur extends Model
{
    protected $table = 'prosedurs';
    protected $fillable = ['layanan_id', 'nama', 'deskripsi', 'link_download'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
