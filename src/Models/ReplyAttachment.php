<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\MediaType;

/**
 * @property int $id
 * @property int $ticket_reply_id
 * @property MediaType|null $type
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\TicketReply $ticketReply
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment whereTicketReplyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReplyAttachment whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ReplyAttachment extends Model
{
    protected $fillable = [
        'ticket_reply_id',
        'type',
        'path',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function ticketReply(): BelongsTo
    {
        return $this->belongsTo(TicketReply::class);
    }
}
