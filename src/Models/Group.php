<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Enums\GroupStatus;
use IncadevUns\CoreDomain\Traits\CanBeAudited;
use IncadevUns\CoreDomain\Traits\CanBeRated;

/**
 * @property int $id
 * @property int $course_version_id
 * @property string $name
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property GroupStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Certificate> $certificates
 * @property-read int|null $certificates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\ClassSession> $classSessions
 * @property-read int|null $class_sessions_count
 * @property-read \IncadevUns\CoreDomain\Models\CourseVersion $courseVersion
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Enrollment> $enrollments
 * @property-read int|null $enrollments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Exam> $exams
 * @property-read int|null $exams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\SurveyResponse> $ratings
 * @property-read int|null $ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Illuminate\Foundation\Auth\User> $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Illuminate\Foundation\Auth\User> $teachers
 * @property-read int|null $teachers_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group whereCourseVersionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Group whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Group extends Model
{
    use CanBeAudited, CanBeRated;

    protected $fillable = [
        'course_version_id',
        'name',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => GroupStatus::class,
    ];

    public function courseVersion(): BelongsTo
    {
        return $this->belongsTo(CourseVersion::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(
            config('auth.providers.users.model', 'App\Models\User'),
            'group_teachers',
            'group_id',
            'user_id'
        )->withTimestamps();
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(
            config('auth.providers.users.model', 'App\Models\User'),
            'enrollments',
            'group_id',
            'user_id'
        )->withTimestamps();
    }

    public function classSessions(): HasMany
    {
        return $this->hasMany(ClassSession::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
