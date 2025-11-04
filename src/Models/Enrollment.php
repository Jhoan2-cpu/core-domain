<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use IncadevUns\CoreDomain\Enums\EnrollmentAcademicStatus;
use IncadevUns\CoreDomain\Enums\PaymentStatus;

/**
 * @property int $id
 * @property int $group_id
 * @property int $user_id
 * @property PaymentStatus $payment_status
 * @property EnrollmentAcademicStatus $academic_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Attendance> $attendances
 * @property-read int|null $attendances_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Grade> $grades
 * @property-read int|null $grades_count
 * @property-read \IncadevUns\CoreDomain\Models\Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\EnrollmentPayment> $payments
 * @property-read int|null $payments_count
 * @property-read \IncadevUns\CoreDomain\Models\EnrollmentResult|null $result
 * @property-read \Illuminate\Foundation\Auth\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereAcademicStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Enrollment extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'payment_status',
        'academic_status',
    ];

    protected $casts = [
        'payment_status' => PaymentStatus::class,
        'academic_status' => EnrollmentAcademicStatus::class,
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(EnrollmentPayment::class);
    }

    public function result(): HasOne
    {
        return $this->hasOne(EnrollmentResult::class);
    }
}
