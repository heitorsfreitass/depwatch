<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScanDependency extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'declared_version',
        'resolved_version',
        'is_used_in_code',
        'triage_status',
        'triage_reason',
        'impact_score',
        'has_breaking_update',
        'has_cve'
    ];

    protected function casts(): array
    {
        return [
            'is_used_in_code' => 'boolean',
            'has_breaking_update' => 'boolean',
            'has_cve' => 'boolean',
        ];
    }

    public function scan(): BelongsTo
    {
        return $this->belongsTo(Scan::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
