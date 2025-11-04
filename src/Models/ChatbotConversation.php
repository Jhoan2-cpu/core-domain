<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon $started_at
 * @property \Illuminate\Support\Carbon|null $ended_at
 * @property int|null $satisfaction_rating
 * @property string|null $feedback
 * @property bool $resolved
 * @property bool $handed_to_human
 * @property string|null $first_message
 * @property string|null $last_bot_response
 * @property int $message_count
 * @property int|null $faq_matched_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\ChatbotFaq|null $faqMatched
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereFaqMatchedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereFirstMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereHandedToHuman($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereLastBotResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereMessageCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereResolved($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereSatisfactionRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatbotConversation whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ChatbotConversation extends Model
{
    protected $fillable = [
        'started_at',
        'ended_at',
        'satisfaction_rating',
        'feedback',
        'resolved',
        'handed_to_human',
        'first_message',
        'last_bot_response',
        'message_count',
        'faq_matched_id',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'satisfaction_rating' => 'integer',
        'resolved' => 'boolean',
        'handed_to_human' => 'boolean',
        'message_count' => 'integer',
    ];

    public function faqMatched(): BelongsTo
    {
        return $this->belongsTo(ChatbotFaq::class, 'faq_matched_id');
    }
}
