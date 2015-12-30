<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 6-4 各種アプリケーションのユニットテスト
 * Class BasicMiddleware
 */
class BasicMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->get('id')) {
            return redirect('/');
        }
        return $next($request);
    }
}
