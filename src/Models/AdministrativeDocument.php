<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use IncadevUns\CoreDomain\Enums\MediaType;

/**
 * @property int $id
 * @property string $name
 * @property MediaType|null $type
 * @property string $path
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdministrativeDocument whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class AdministrativeDocument extends Model
{
    protected $fillable = [
        'name',
        'type',
        'path',
        'description',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];
}
