<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Helpers\ActivityLogger;

class CacheController extends Controller
{
    public function clear(Request $request)
    {
        try {
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            Artisan::call('cache:clear');

            ActivityLogger::log('System', 'CACHE_CLEAR', 'Cleared compiled views, route cache, config cache, and application cache.');

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'System cache, routes, views, and configurations cleared successfully.',
                ]);
            }

            return back()->with('success', 'All system caches have been cleared and primed successfully.');
        } catch (\Throwable $e) {
            ActivityLogger::log('System', 'CACHE_CLEAR_FAILED', 'Failed to clear cache: ' . $e->getMessage());

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error clearing cache: ' . $e->getMessage(),
                ], 500);
            }

            return back()->with('error', 'Error clearing system cache: ' . $e->getMessage());
        }
    }
}
