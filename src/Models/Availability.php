<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $day_of_week
 * @property string $start_time
 * @property string $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Foundation\Auth\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Availability extends Model
{
    protected $fillable = [
        'user_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'day_of_week' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }
}
