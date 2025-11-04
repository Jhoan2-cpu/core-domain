<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\AppointmentStatus;
use IncadevUns\CoreDomain\Traits\CanBeAudited;
use IncadevUns\CoreDomain\Traits\CanBeRated;

/**
 * @property int $id
 * @property int $teacher_id
 * @property int $student_id
 * @property \Illuminate\Support\Carbon $start_time
 * @property \Illuminate\Support\Carbon $end_time
 * @property AppointmentStatus $status
 * @property string|null $meet_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\SurveyResponse> $ratings
 * @property-read int|null $ratings_count
 * @property-read \Illuminate\Foundation\Auth\User $student
 * @property-read \Illuminate\Foundation\Auth\User $teacher
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereMeetUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Appointment extends Model
{
    use CanBeAudited, CanBeRated;

    protected $fillable = [
        'teacher_id',
        'student_id',
        'start_time',
        'end_time',
        'status',
        'meet_url',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'status' => AppointmentStatus::class,
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'), 'teacher_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'student_id');
    }
}
