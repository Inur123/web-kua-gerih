<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalLayanan extends Model
{
    use HasFactory;
    protected $table = 'total_layanans';
    protected $fillable = ['layanan_id', 'tahun', 'total'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
