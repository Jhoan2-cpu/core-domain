<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\AgreementStatus;

/**
 * @property int $id
 * @property int $organization_id
 * @property string $name
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon|null $renewal_date
 * @property string|null $purpose
 * @property AgreementStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\Organization $organization
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement whereRenewalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agreement whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Agreement extends Model
{
    protected $fillable = [
        'organization_id',
        'name',
        'start_date',
        'renewal_date',
        'purpose',
        'status',
    ];

    protected $casts = [
        'status' => AgreementStatus::class,
        'start_date' => 'date',
        'renewal_date' => 'date',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
