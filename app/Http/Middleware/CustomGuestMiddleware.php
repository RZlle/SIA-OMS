<?php

namespace App\Http\Middleware;

use App\Models\Account;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {

            $account = Account::where('email', Auth::user()->email)->first();

            if ($account->accountType === 'S') {
                return redirect()->route('studentDashboard');
            } elseif ($account->accountType === 'A') {
                return redirect()->route('program-adviser');
            } elseif ($account->accountType === 'C') {
                return redirect()->route('ojt-coordinator');
            }
        }

        return $next($request);
    }
}
