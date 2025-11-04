<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $survey_id
 * @property string $question
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\ResponseDetail> $responseDetails
 * @property-read int|null $response_details_count
 * @property-read \IncadevUns\CoreDomain\Models\Survey $survey
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyQuestion whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class SurveyQuestion extends Model
{
    protected $fillable = [
        'survey_id',
        'question',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function responseDetails(): HasMany
    {
        return $this->hasMany(ResponseDetail::class);
    }
}
