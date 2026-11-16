<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogger;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::with('user')->recent();

        if ($request->filled('module')) {
            $query->module($request->module);
        }

        if ($request->filled('action')) {
            $query->action($request->action);
        }

        if ($request->filled('user_id')) {
            $query->user($request->user_id);
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($search, $like) {
                $q->where('description', $like, "%{$search}%")
                  ->orWhere('ip_address', $like, "%{$search}%");
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $logs = $query->paginate(20)->withQueryString();

        $modules = ActivityLog::select('module')->distinct()->pluck('module');
        $actions = ActivityLog::select('action')->distinct()->pluck('action');
        $users   = User::orderBy('name')->get(['id', 'name', 'email']);

        return view('admin.logs.index', compact('logs', 'modules', 'actions', 'users'));
    }

    public function show(ActivityLog $log)
    {
        $log->load('user');

        return response()->json([
            'id'          => $log->id,
            'user'        => $log->user ? $log->user->name . " ({$log->user->email})" : 'System / Guest',
            'module'      => $log->module,
            'action'      => $log->action,
            'description' => $log->description,
            'ip_address'  => $log->ip_address,
            'user_agent'  => $log->user_agent,
            'created_at'  => $log->created_at->format('M d, Y • h:i:s A'),
            'old_values'  => $log->old_values,
            'new_values'  => $log->new_values,
        ]);
    }

    public function clear(Request $request)
    {
        $days = (int) $request->input('days', 30);
        $cutoff = now()->subDays($days);

        $count = ActivityLog::where('created_at', '<', $cutoff)->delete();

        ActivityLogger::log('Audit', 'CLEAR_LOGS', "Cleared {$count} activity log records older than {$days} days.");

        return back()->with('success', "Audit cleanup complete: {$count} log records pruned.");
    }
}
