<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * Get the posts that belong to this tag.
     */
   public function posts()
{
    return $this->belongsToMany(Post::class)->withTimestamps();
}
}
