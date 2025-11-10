<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'image', 'excerpt', 'description', 'featured', 'keywords',
    ];

      protected $casts = [
        'featured' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
            $blog->excerpt = $blog->excerpt ?? Str::limit(strip_tags($blog->description), 120);
        });
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/blogs/' . $this->image) : asset('images/default-blog.webp');
    }
}
