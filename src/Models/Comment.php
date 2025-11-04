<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Traits\CanBeVoted;

/**
 * @property int $id
 * @property int $user_id
 * @property int $thread_id
 * @property int|null $parent_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Vote> $downvotes
 * @property-read int|null $downvotes_count
 * @property-read Comment|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Comment> $replies
 * @property-read int|null $replies_count
 * @property-read \IncadevUns\CoreDomain\Models\Thread $thread
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Vote> $upvotes
 * @property-read int|null $upvotes_count
 * @property-read \Illuminate\Foundation\Auth\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Vote> $votes
 * @property-read int|null $votes_count
 * @property-read mixed $votes_score
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use CanBeVoted;

    protected $fillable = [
        'user_id',
        'thread_id',
        'parent_id',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
