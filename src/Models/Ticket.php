<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Enums\TicketPriority;
use IncadevUns\CoreDomain\Enums\TicketStatus;
use IncadevUns\CoreDomain\Enums\TicketType;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property TicketType|null $type
 * @property TicketStatus $status
 * @property TicketPriority $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\TicketReply> $replies
 * @property-read int|null $replies_count
 * @property-read \Illuminate\Foundation\Auth\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'type',
        'status',
        'priority',
    ];

    protected $casts = [
        'type' => TicketType::class,
        'status' => TicketStatus::class,
        'priority' => TicketPriority::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function replies(): HasMany
    {
        return $this->hasMany(TicketReply::class);
    }
}
