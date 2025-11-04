<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $votable_type
 * @property int $votable_id
 * @property int $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Foundation\Auth\User $user
 * @property-read Model|\Eloquent $votable
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereVotableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereVotableType($value)
 *
 * @mixin \Eloquent
 */
class Vote extends Model
{
    protected $fillable = [
        'user_id',
        'votable_id',
        'votable_type',
        'value',
    ];

    protected $casts = [
        'value' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function votable(): MorphTo
    {
        return $this->morphTo();
    }
}
