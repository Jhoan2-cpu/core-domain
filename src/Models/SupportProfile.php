<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property array<array-key, mixed>|null $skills
 * @property int|null $experience_years
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Foundation\Auth\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile whereExperienceYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SupportProfile whereUserId($value)
 *
 * @mixin \Eloquent
 */
class SupportProfile extends Model
{
    protected $fillable = [
        'user_id',
        'skills',
        'experience_years',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }
}
