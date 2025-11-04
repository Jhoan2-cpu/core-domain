<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property string|null $category
 * @property array<array-key, mixed>|null $keywords
 * @property bool $active
 * @property int $usage_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\ChatbotConversation> $conversationsMatched
 * @property-read int|null $conversations_matched_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotFaq whereUsageCount($value)
 *
 * @mixin \Eloquent
 */
class ChatbotFaq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'category',
        'keywords',
        'active',
        'usage_count',
    ];

    protected $casts = [
        'keywords' => 'array',
        'active' => 'boolean',
        'usage_count' => 'integer',
    ];

    public function conversationsMatched(): HasMany
    {
        return $this->hasMany(ChatbotConversation::class, 'faq_matched_id');
    }
}
