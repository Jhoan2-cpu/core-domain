<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\EnrollmentResultStatus;

/**
 * @property int $id
 * @property int $enrollment_id
 * @property numeric $final_grade
 * @property numeric $attendance_percentage
 * @property EnrollmentResultStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\Enrollment $enrollment
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult whereAttendancePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult whereEnrollmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult whereFinalGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentResult whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class EnrollmentResult extends Model
{
    protected $fillable = [
        'enrollment_id',
        'final_grade',
        'attendance_percentage',
        'status',
    ];

    protected $casts = [
        'final_grade' => 'decimal:2',
        'attendance_percentage' => 'decimal:2',
        'status' => EnrollmentResultStatus::class,
    ];

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
