<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\SurveyEvent;

/**
 * @property int $id
 * @property SurveyEvent $event
 * @property int $survey_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\Survey $survey
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyMapping whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class SurveyMapping extends Model
{
    protected $fillable = [
        'event',
        'survey_id',
        'description',
    ];

    protected $casts = [
        'event' => SurveyEvent::class,
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
