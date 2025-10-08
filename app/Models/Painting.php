<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Painting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'art_type',
        'orientation',
        'dimensions',
        'images',
        'medium',
        'color_palette',
        'year_created',
        'category',
        'artist_name',
        'tags',
        'slug',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    // Automatically generate slug on creation
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($painting) {
            $painting->slug = Str::slug($painting->title . '-' . Str::random(5));
        });
    }
}
