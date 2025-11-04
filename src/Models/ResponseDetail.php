<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $survey_response_id
 * @property int $survey_question_id
 * @property int|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\SurveyQuestion $surveyQuestion
 * @property-read \IncadevUns\CoreDomain\Models\SurveyResponse $surveyResponse
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail whereSurveyQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail whereSurveyResponseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResponseDetail whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ResponseDetail extends Model
{
    protected $fillable = [
        'survey_response_id',
        'survey_question_id',
        'score',
    ];

    protected $casts = [
        'score' => 'integer',
    ];

    public function surveyResponse(): BelongsTo
    {
        return $this->belongsTo(SurveyResponse::class, 'survey_response_id');
    }

    public function surveyQuestion(): BelongsTo
    {
        return $this->belongsTo(SurveyQuestion::class, 'survey_question_id');
    }
}
