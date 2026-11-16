<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class ActivityLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'module',
        'action',
        'description',
        'old_values',
        'new_values',
        'ip_address',
        'user_agent',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'old_values' => 'array',
            'new_values' => 'array',
            'created_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRecent(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
    }

    public function scopeModule(Builder $query, ?string $module): Builder
    {
        return $module ? $query->where('module', $module) : $query;
    }

    public function scopeAction(Builder $query, ?string $action): Builder
    {
        return $action ? $query->where('action', $action) : $query;
    }

    public function scopeUser(Builder $query, ?int $userId): Builder
    {
        return $userId ? $query->where('user_id', $userId) : $query;
    }
}
