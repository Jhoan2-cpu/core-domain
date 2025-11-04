<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\MediaType;

/**
 * @property int $id
 * @property int $class_session_id
 * @property MediaType|null $type
 * @property string $material_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\ClassSession $classSession
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial whereClassSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial whereMaterialUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSessionMaterial whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ClassSessionMaterial extends Model
{
    protected $fillable = [
        'class_session_id',
        'type',
        'material_url',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function classSession(): BelongsTo
    {
        return $this->belongsTo(ClassSession::class);
    }
}
