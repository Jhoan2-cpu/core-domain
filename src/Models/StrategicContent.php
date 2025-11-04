<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use IncadevUns\CoreDomain\Enums\StrategicContentType;

/**
 * @property int $id
 * @property StrategicContentType $type
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicContent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicContent whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicContent whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicContent whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class StrategicContent extends Model
{
    protected $fillable = [
        'type',
        'content',
    ];

    protected $casts = [
        'type' => StrategicContentType::class,
    ];
}
