<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalLayanan extends Model
{
    use HasFactory;

    protected $table = 'total_layanans';
    protected $fillable = ['layanan_id', 'tanggal', 'total'];

    protected $dates = ['tanggal'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    protected $casts = [
    'tanggal' => 'datetime',
];
}
