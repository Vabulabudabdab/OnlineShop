<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_at && now()->lessThan(auth()->user()->banned_at)) {

            $ban_time =  auth()->user()->banned_at;

            $banned_days = now()->diffInDays($ban_time);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Your account has been banned. Please contact administrator.';
            } else {
                $message = 'Your account has been banned for '.Str::CutToFirstPoint($banned_days).' day ' . 'Please contact administrator.';
            }

            return redirect()->route('login.get')->with('banned', $message);
        }

        return $next($request);
    }

}
