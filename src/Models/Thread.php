<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Traits\CanBeVoted;

/**
 * @property int $id
 * @property int $user_id
 * @property int $forum_id
 * @property string $title
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Vote> $downvotes
 * @property-read int|null $downvotes_count
 * @property-read \IncadevUns\CoreDomain\Models\Forum $forum
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Vote> $upvotes
 * @property-read int|null $upvotes_count
 * @property-read \Illuminate\Foundation\Auth\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Vote> $votes
 * @property-read int|null $votes_count
 * @property-read mixed $votes_score
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereForumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Thread extends Model
{
    use CanBeVoted;

    protected $fillable = [
        'user_id',
        'forum_id',
        'title',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function forum(): BelongsTo
    {
        return $this->belongsTo(Forum::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
