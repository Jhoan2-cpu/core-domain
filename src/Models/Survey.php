<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\SurveyMapping> $mappings
 * @property-read int|null $mappings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\SurveyQuestion> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\SurveyResponse> $responses
 * @property-read int|null $responses_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Survey extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(SurveyQuestion::class);
    }

    public function responses(): HasMany
    {
        return $this->hasMany(SurveyResponse::class);
    }

    public function mappings(): HasMany
    {
        return $this->hasMany(SurveyMapping::class);
    }
}
