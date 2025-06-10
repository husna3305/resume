<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'author_id',
        'news_category_id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'is_published',
        'published_at',
        'view_count',
        'comment_count',
        'like_count',
        'dislike_count',
        'share_count',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'og_title',
        'og_description',
        'og_image',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function newsCategory()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function banner()
    {
        return $this->hasOne(Banner::class);
    }
}
