<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'surveys';

    protected $fillable = ['name', 'email', 'rating', 'feedback', 'layanan_id'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
