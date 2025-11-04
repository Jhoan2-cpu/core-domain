<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use IncadevUns\CoreDomain\Enums\MediaType;

/**
 * @property int $id
 * @property string $name
 * @property string $path
 * @property MediaType|null $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class StrategicDocument extends Model
{
    protected $fillable = [
        'name',
        'path',
        'type',
        'description',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];
}
