<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    protected $fillable = ['title', 'excerpt', 'body', 'published_at', 'category_id'];

    protected $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '!=', null);
    }
}
