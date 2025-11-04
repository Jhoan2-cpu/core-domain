<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Enums\OrganizationType;

/**
 * @property int $id
 * @property string|null $ruc
 * @property string $name
 * @property OrganizationType|null $type
 * @property string|null $contact_phone
 * @property string|null $contact_email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Agreement> $agreements
 * @property-read int|null $agreements_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereRuc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Organization extends Model
{
    protected $fillable = [
        'ruc',
        'name',
        'type',
        'contact_phone',
        'contact_email',
    ];

    protected $casts = [
        'type' => OrganizationType::class,
    ];

    public function agreements(): HasMany
    {
        return $this->hasMany(Agreement::class);
    }
}
