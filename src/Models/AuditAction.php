<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\AuditActionStatus;

/**
 * @property int $id
 * @property int $audit_finding_id
 * @property int|null $responsible_id
 * @property string $action_required
 * @property \Illuminate\Support\Carbon|null $due_date
 * @property AuditActionStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IncadevUns\CoreDomain\Models\AuditFinding $auditFinding
 * @property-read \Illuminate\Foundation\Auth\User|null $responsible
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction whereActionRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction whereAuditFindingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction whereResponsibleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditAction whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class AuditAction extends Model
{
    protected $fillable = [
        'audit_finding_id',
        'responsible_id',
        'action_required',
        'due_date',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
        'status' => AuditActionStatus::class,
    ];

    public function auditFinding(): BelongsTo
    {
        return $this->belongsTo(AuditFinding::class);
    }

    public function responsible(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'responsible_id');
    }
}
