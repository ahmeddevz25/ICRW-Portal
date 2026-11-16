<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait LogsActivity
{
    public static function bootLogsActivity(): void
    {
        static::created(function ($model) {
            self::logModelEvent('CREATE', $model, null, self::filterSensitive($model->getAttributes()));
        });

        static::updated(function ($model) {
            $changes = $model->getChanges();
            unset($changes['updated_at']);

            if (!empty($changes)) {
                $original = array_intersect_key($model->getOriginal(), $changes);
                self::logModelEvent('UPDATE', $model, self::filterSensitive($original), self::filterSensitive($changes));
            }
        });

        static::deleted(function ($model) {
            self::logModelEvent('DELETE', $model, self::filterSensitive($model->getAttributes()), null);
        });
    }

    protected static function logModelEvent(string $action, $model, ?array $oldValues, ?array $newValues): void
    {
        $module = class_basename($model);
        $identifier = $model->name ?? $model->title ?? $model->email ?? '#' . $model->getKey();

        ActivityLog::create([
            'user_id'     => Auth::id(),
            'module'      => $module,
            'action'      => $action,
            'description' => "{$action} {$module} [{$identifier}]",
            'old_values'  => $oldValues,
            'new_values'  => $newValues,
            'ip_address'  => Request::ip(),
            'user_agent'  => Request::userAgent(),
            'created_at'  => now(),
        ]);
    }

    protected static function filterSensitive(?array $attributes): ?array
    {
        if (!$attributes) {
            return null;
        }

        $hidden = ['password', 'remember_token', 'token'];
        foreach ($hidden as $key) {
            if (isset($attributes[$key])) {
                $attributes[$key] = '********';
            }
        }

        return $attributes;
    }
}
