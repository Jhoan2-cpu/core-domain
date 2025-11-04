<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\MediaType;

/**
 * @property int $id
 * @property int $message_id
 * @property MediaType|null $type
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\Message $message
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MessageFile whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class MessageFile extends Model
{
    protected $fillable = [
        'message_id',
        'type',
        'path',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
}
