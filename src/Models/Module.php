<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $course_version_id
 * @property string $title
 * @property string|null $description
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\ClassSession> $classSessions
 * @property-read int|null $class_sessions_count
 * @property-read \IncadevUns\CoreDomain\Models\CourseVersion $courseVersion
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Exam> $exams
 * @property-read int|null $exams_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module whereCourseVersionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Module whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Module extends Model
{
    protected $fillable = [
        'course_version_id',
        'title',
        'description',
        'sort',
    ];

    protected $casts = [
        'sort' => 'integer',
    ];

    public function courseVersion(): BelongsTo
    {
        return $this->belongsTo(CourseVersion::class);
    }

    public function classSessions(): HasMany
    {
        return $this->hasMany(ClassSession::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }
}
