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
 * @property string|null $exam_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Grade> $grades
 * @property-read int|null $grades_count
 * @property-read \IncadevUns\CoreDomain\Models\Group $group
 * @property-read \IncadevUns\CoreDomain\Models\Module $module
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereExamUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exam whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Exam extends Model
{
    protected $fillable = [
        'group_id',
        'module_id',
        'title',
        'start_time',
        'end_time',
        'exam_url',
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

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
