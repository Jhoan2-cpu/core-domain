<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Enums\AuditFindingStatus;
use IncadevUns\CoreDomain\Enums\SeverityLevel;

/**
 * @property int $id
 * @property int $audit_id
 * @property string $description
 * @property SeverityLevel $severity
 * @property AuditFindingStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\AuditAction> $actions
 * @property-read int|null $actions_count
 * @property-read \IncadevUns\CoreDomain\Models\Audit $audit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\FindingEvidence> $evidences
 * @property-read int|null $evidences_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding whereAuditId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding whereSeverity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditFinding whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class AuditFinding extends Model
{
    protected $fillable = [
        'audit_id',
        'description',
        'severity',
        'status',
    ];

    protected $casts = [
        'severity' => SeverityLevel::class,
        'status' => AuditFindingStatus::class,
    ];

    public function audit(): BelongsTo
    {
        return $this->belongsTo(Audit::class);
    }

    public function evidences(): HasMany
    {
        return $this->hasMany(FindingEvidence::class);
    }

    public function actions(): HasMany
    {
        return $this->hasMany(AuditAction::class);
    }
}
