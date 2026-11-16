<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Traits\LogsActivity;

class Role extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_system',
        'priority',
    ];

    protected function casts(): array
    {
        return [
            'is_system' => 'boolean',
            'priority'  => 'integer',
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    public function hasPermission(string $permissionSlug): bool
    {
        return $this->permissions->contains('slug', $permissionSlug);
    }

    public function givePermission(Permission|string $permission): void
    {
        if (is_string($permission)) {
            $permission = Permission::where('slug', $permission)->firstOrFail();
        }

        $this->permissions()->syncWithoutDetaching([$permission->id]);
    }

    public function revokePermission(Permission|string $permission): void
    {
        if (is_string($permission)) {
            $permission = Permission::where('slug', $permission)->firstOrFail();
        }

        $this->permissions()->detach($permission->id);
    }
}
