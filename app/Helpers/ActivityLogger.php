<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLogger
{
    public static function log(
        string $module,
        string $action,
        string $description,
        ?array $oldValues = null,
        ?array $newValues = null,
        ?int $userId = null
    ): ActivityLog {
        return ActivityLog::create([
            'user_id'     => $userId ?? Auth::id(),
            'module'      => $module,
            'action'      => strtoupper($action),
            'description' => $description,
            'old_values'  => $oldValues,
            'new_values'  => $newValues,
            'ip_address'  => Request::ip(),
            'user_agent'  => Request::userAgent(),
            'created_at'  => now(),
        ]);
    }
}
