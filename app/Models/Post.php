<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Post extends Model implements HasMedia, Viewable, Feedable
{
    use HasFactory, InteractsWithMedia, InteractsWithViews;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'description',
        'content',
        'slug',
        'category_id',
        'posted_at',
    ];


    protected $removeViewsOnDelete = true;

    /**
     * Prepare a date for array / JSON serialization.
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'posted_at'
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'slug';
    }

    /**
     * Scope a query to search posts
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('title', 'LIKE', "%{$search}%");
        }
    }

    /**
     * Scope a query to only include posts posted last month.
     */
    public function scopeLastMonth(Builder $query, int $limit = 5): Builder
    {
        return $query->whereBetween('posted_at', [carbon('1 month ago'), now()])
            ->latest()
            ->limit($limit);
    }

    /**
     * Scope a query to only include posts posted last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('posted_at', [carbon('1 week ago'), now()])
            ->latest();
    }

    /**
     * Return the post's author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Return the post's comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * return the excerpt of the post content
     */
    public function excerpt(int $length = 50): string
    {
        return Str::limit($this->content, $length);
    }


    /**
     * return the next post after the current post
     */
    public function getNextUrlAttribute()
    {
        $next = Post::where('id', '<', $this->id)->orderBy('id', 'asc')?->first();
        if ($next == null) return '';
        return route('posts.show', $next->slug);
    }

    /**
     * return the  post after the current post
     */
    public function getPreviousUrlAttribute()
    {
        $previous = Post::where('id', '>', $this->id)->orderBy('id', 'asc')?->first();
        if ($previous == null) return '';
        return route('posts.show', $previous->slug);
    }

    public function getThumbnailAttribute()
    {
        return $this->hasMedia('banner') ? $this->getFirstMediaUrl('banner', 'thumb') : asset('img/placeholder.png');
    }


    /**
     * return the  post after the current post
     */
    public function getIsPublishedAttribute(): bool
    {
        return $this->posted_at != null;
    }


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('banner')
            ->singleFile()
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('thumb')
                    ->width(350)
                    ->height(250);
            });
    }


    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->link(route('posts.show', $this))
            ->authorName($this->author->name)
            ->authorEmail($this->author->email);
    }

    public static function getFeedItems()
    {
        return static::all();
    }
}
