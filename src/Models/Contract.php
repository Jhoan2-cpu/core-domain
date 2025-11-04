<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Enums\StaffPaymentType;
use IncadevUns\CoreDomain\Enums\StaffType;

/**
 * @property int $id
 * @property int $user_id
 * @property StaffType|null $staff_type
 * @property StaffPaymentType|null $payment_type
 * @property numeric $amount
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\PayrollExpense> $payrollExpenses
 * @property-read int|null $payroll_expenses_count
 * @property-read \Illuminate\Foundation\Auth\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract whereStaffType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contract whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Contract extends Model
{
    protected $fillable = [
        'user_id',
        'staff_type',
        'payment_type',
        'amount',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'staff_type' => StaffType::class,
        'payment_type' => StaffPaymentType::class,
        'amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function payrollExpenses(): HasMany
    {
        return $this->hasMany(PayrollExpense::class);
    }
}
