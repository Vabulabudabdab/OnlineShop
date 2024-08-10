<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_at && now()->lessThan(auth()->user()->banned_at)) {

            $ban_time = auth()->user()->banned_at;

            $banned_days = now()->diffInDays($ban_time);
            $banned_hours = now()->diffInHours($ban_time);

            Auth::logout();

            if ($banned_days > 14) {
                $message = 'Your account has been banned. Please contact administrator.';
            } elseif($banned_days < 14 && $banned_hours > 24) {
                $message = 'Your account has been banned for '.Str::CutToFirstPoint($banned_days). 'day(s) '.  'Please contact administrator.';
            } else {
                $message = 'Your account has been banned for '.Str::CutToFirstPoint($banned_hours).' hour(s) ' . 'Please contact administrator.';
            }

            return redirect()->route('login.get')->with('banned', $message);
        }

        return $next($request);
    }

}
