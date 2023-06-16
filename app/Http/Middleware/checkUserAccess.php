<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

class CheckUserAccess
{
    public function handle(Request $request, Closure $next)
    {
        $orderId = $request->route('id');
        $userId = Auth::id();
        $isAdmin = Auth::user()->is_admin;

        if ($isAdmin) {
            return $next($request);
        }

        $order = Orders::where('id', $orderId)->where('user_id', $userId)->first();

        if (!$order) {
            abort(403);
        }

        return $next($request);
    }
}
