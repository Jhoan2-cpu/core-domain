<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property array<array-key, mixed>|null $requirements
 * @property \Illuminate\Support\Carbon|null $closing_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Illuminate\Foundation\Auth\User> $applicants
 * @property-read int|null $applicants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Application> $applications
 * @property-read int|null $applications_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereClosingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Offer extends Model
{
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'closing_date',
    ];

    protected $casts = [
        'requirements' => 'array',
        'closing_date' => 'date',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function applicants(): BelongsToMany
    {
        return $this->belongsToMany(
            config('auth.providers.users.model', 'App\Models\User'),
            'applications',
            'offer_id',
            'user_id'
        )->withPivot('cv_path', 'status', 'created_at');
    }
}
