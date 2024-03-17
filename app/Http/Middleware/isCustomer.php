<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        throw_if(!$user || ($user && !in_array($user->authority, ['admin', 'customer'])), 'Un Authorised user');
        if ($user->authority == 'customer') {
            return redirect('/home');
        }
        if ($user->authority == 'admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Admins Not authorized');
        }
        return $next($request);
    }
}
