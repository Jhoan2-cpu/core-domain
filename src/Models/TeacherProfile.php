<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property array<array-key, mixed>|null $subject_areas
 * @property string|null $professional_summary
 * @property string|null $cv_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Foundation\Auth\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile whereCvPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile whereProfessionalSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile whereSubjectAreas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeacherProfile whereUserId($value)
 *
 * @mixin \Eloquent
 */
class TeacherProfile extends Model
{
    protected $fillable = [
        'user_id',
        'subject_areas',
        'professional_summary',
        'cv_path',
    ];

    protected $casts = [
        'subject_areas' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }
}
