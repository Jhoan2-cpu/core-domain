<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\MediaType;

/**
 * @property MediaType $type
 * @property-read \IncadevUns\CoreDomain\Models\AuditFinding|null $auditFinding
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FindingEvidence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FindingEvidence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FindingEvidence query()
 *
 * @mixin \Eloquent
 */
class FindingEvidence extends Model
{
    protected $fillable = [
        'audit_finding_id',
        'type',
        'path',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function auditFinding(): BelongsTo
    {
        return $this->belongsTo(AuditFinding::class);
    }
}
