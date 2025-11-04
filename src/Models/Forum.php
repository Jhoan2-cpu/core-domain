<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Thread> $threads
 * @property-read int|null $threads_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Forum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Forum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Forum query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Forum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Forum whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Forum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Forum whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Forum whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Forum extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }
}
