<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property int $survey_id
 * @property int $user_id
 * @property string $rateable_type
 * @property int $rateable_id
 * @property \Illuminate\Support\Carbon|null $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $rateable
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\ResponseDetail> $responseDetails
 * @property-read int|null $response_details_count
 * @property-read \IncadevUns\CoreDomain\Models\Survey $survey
 * @property-read \Illuminate\Foundation\Auth\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse whereRateableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse whereRateableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyResponse whereUserId($value)
 *
 * @mixin \Eloquent
 */
class SurveyResponse extends Model
{
    protected $fillable = [
        'survey_id',
        'user_id',
        'rateable_id',
        'rateable_type',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function rateable(): MorphTo
    {
        return $this->morphTo();
    }

    public function responseDetails(): HasMany
    {
        return $this->hasMany(ResponseDetail::class);
    }
}
