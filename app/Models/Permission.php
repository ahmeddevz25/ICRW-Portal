<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Traits\LogsActivity;

class Permission extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'module',
        'name',
        'slug',
        'description',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
