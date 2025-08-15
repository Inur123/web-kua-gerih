<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'status', 'content',
        'thumbnail', 'category_id', 'published_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = static::generateUniqueSlug($post->title);
        });

        static::updating(function ($post) {
            $post->slug = static::generateUniqueSlug($post->title, $post->id);
        });
    }

    private static function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($id, fn($query) => $query->where('id', '!=', $id))
            ->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
   public function tags()
{
    return $this->belongsToMany(Tag::class)->withTimestamps();
}
public function getTagsListAttribute()
{
    return $this->tags->pluck('name')->implode(', ');
}
protected $casts = [
    'published_at' => 'datetime',
];
}

