<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    use HasFactory;
    protected $table = 'lampirans';
    protected $fillable = [
        'regulasi_id',
        'nama',
        'deskripsi',
        'link_download',
    ];

    public function regulasi()
    {
        return $this->belongsTo(Regulasi::class);
    }
}
