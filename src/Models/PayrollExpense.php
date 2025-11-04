<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $contract_id
 * @property numeric $amount
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\Contract $contract
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollExpense whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class PayrollExpense extends Model
{
    protected $fillable = [
        'contract_id',
        'amount',
        'date',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'date',
    ];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}
