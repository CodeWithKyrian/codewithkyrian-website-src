<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'parent_id',
      'author_id',
      'author_name',
      'post_id',
      'content',
    ];


    /**
     * Scope a query to only include comments posted last week.
     */
    public function scopeBase(Builder $query): Builder
    {
        return $query->where('parent_id', null);
    }

    /**
     * Scope a query to only include comments posted last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('created_at', [carbon('1 week ago'), now()])
                     ->latest();
    }

    /**
     * Return the comment's author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Return the comment's post
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function replies() : HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
