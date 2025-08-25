<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'status', 'slug'];

    // Relasi persyaratan
    public function persyaratans()
    {
        return $this->hasMany(Persyaratan::class);
    }
    public function syaratKhusus()
    {
        return $this->hasMany(SyaratKhusus::class);
    }

    public function prosedurs()
    {
        return $this->hasMany(Prosedur::class);
    }

    // Boot method untuk membuat slug otomatis
    protected static function booted()
    {
        static::creating(function ($layanan) {
            $layanan->slug = Str::slug($layanan->nama);
        });

        static::updating(function ($layanan) {
            $layanan->slug = Str::slug($layanan->nama);
        });
    }
}
