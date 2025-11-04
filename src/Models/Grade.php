<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $exam_id
 * @property int $enrollment_id
 * @property numeric $grade
 * @property string|null $feedback
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\Enrollment $enrollment
 * @property-read \IncadevUns\CoreDomain\Models\Exam $exam
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade whereEnrollmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade whereFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Grade whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Grade extends Model
{
    protected $fillable = [
        'exam_id',
        'enrollment_id',
        'grade',
        'feedback',
    ];

    protected $casts = [
        'grade' => 'decimal:2',
    ];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
