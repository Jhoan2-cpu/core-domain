<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $group_id
 * @property int $module_id
 * @property string $title
 * @property \Illuminate\Support\Carbon $start_time
 * @property \Illuminate\Support\Carbon $end_time
 * @property string|null $meet_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Attendance> $attendances
 * @property-read int|null $attendances_count
 * @property-read \IncadevUns\CoreDomain\Models\Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\ClassSessionMaterial> $materials
 * @property-read int|null $materials_count
 * @property-read \IncadevUns\CoreDomain\Models\Module $module
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereMeetUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClassSession whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ClassSession extends Model
{
    protected $fillable = [
        'group_id',
        'module_id',
        'title',
        'start_time',
        'end_time',
        'meet_url',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function materials(): HasMany
    {
        return $this->hasMany(ClassSessionMaterial::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
