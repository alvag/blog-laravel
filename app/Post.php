<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Post
 *
 * @property int $id
 * @property string $title
 * @property string $excerpt
 * @property Carbon|null $published_at
 * @property string $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Post published
 * @mixin Eloquent
 */
class Post extends Model
{
    protected $fillable = [ 'title', 'excerpt', 'body', 'published_at', 'category_id' ];

    protected $dates = [ 'published_at' ];

    public function category()
    {
        return $this->belongsTo( Category::class );
    }

    public function scopePublished( $query )
    {
        return $query->where( 'published_at', '!=', null );
    }

}
