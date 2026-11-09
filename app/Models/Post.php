<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // without this create() throws MassAssignmentException
    protected $fillable = [
        'author_id',
        'title',
        'category',
        'body',
        'is_published',
        'is_pinned',
        'published_at',
        'views',
    ];

    // sqlite saves booleans as 0/1, casts turn them into true/false
    // published_at becomes a date so we can use ->format() in the views
    protected $casts = [
        'is_published' => 'boolean',
        'is_pinned' => 'boolean',
        'published_at' => 'datetime',
    ];
}
