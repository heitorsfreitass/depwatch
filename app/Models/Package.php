<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'ecosystem',
        'latest_version',
        'health_score',
        'is_deprecated',
        'is_archived',
        'last_fetched_at'
    ];

    public function dependencies(): HasMany
    {
        return $this->hasMany(ScanDependency::class);
    }

    public function vulnerabilities(): HasMany
    {
        return $this->hasMany(PackageVulnerability::class);
    }
}
