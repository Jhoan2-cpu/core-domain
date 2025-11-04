<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property-read \IncadevUns\CoreDomain\Models\Group|null $group
 * @property-read \Illuminate\Foundation\Auth\User|null $teacher
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GroupTeacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GroupTeacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GroupTeacher query()
 *
 * @mixin \Eloquent
 */
class GroupTeacher extends Pivot
{
    protected $fillable = [
        'group_id',
        'user_id',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function teacher(): BelongsTo
    {
        $userModel = config('auth.providers.users.model', 'App\Models\User');

        return $this->belongsTo($userModel, 'user_id');
    }
}
