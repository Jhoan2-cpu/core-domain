<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Enums\CourseVersionStatus;
use IncadevUns\CoreDomain\Traits\CanBeAudited;

/**
 * @property int $id
 * @property int $course_id
 * @property string|null $version
 * @property string $name
 * @property numeric $price
 * @property CourseVersionStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \IncadevUns\CoreDomain\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Group> $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Module> $modules
 * @property-read int|null $modules_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourseVersion whereVersion($value)
 *
 * @mixin \Eloquent
 */
class CourseVersion extends Model
{
    use CanBeAudited;

    protected $fillable = [
        'course_id',
        'version',
        'name',
        'price',
        'status',
    ];

    protected $casts = [
        'status' => CourseVersionStatus::class,
        'price' => 'decimal:2',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
