<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\PaymentVerificationStatus;

/**
 * @property int $id
 * @property int $enrollment_id
 * @property string $operation_number
 * @property string $agency_number
 * @property \Illuminate\Support\Carbon $operation_date
 * @property numeric $amount
 * @property string $evidence_path
 * @property PaymentVerificationStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\Enrollment $enrollment
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereAgencyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereEnrollmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereEvidencePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereOperationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereOperationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EnrollmentPayment whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class EnrollmentPayment extends Model
{
    protected $fillable = [
        'enrollment_id',
        'operation_number',
        'agency_number',
        'operation_date',
        'amount',
        'evidence_path',
        'status',
    ];

    protected $casts = [
        'operation_date' => 'datetime',
        'amount' => 'decimal:2',
        'status' => PaymentVerificationStatus::class,
    ];

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
