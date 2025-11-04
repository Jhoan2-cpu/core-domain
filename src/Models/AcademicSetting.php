<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $base_grade
 * @property int $min_passing_grade
 * @property numeric $absence_percentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting whereAbsencePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting whereBaseGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting whereMinPassingGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSetting whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class AcademicSetting extends Model
{
    protected $fillable = [
        'base_grade',
        'min_passing_grade',
        'absence_percentage',
    ];

    protected $casts = [
        'base_grade' => 'integer',
        'min_passing_grade' => 'integer',
        'absence_percentage' => 'decimal:2',
    ];
}
