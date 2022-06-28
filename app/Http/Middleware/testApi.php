<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class testApi
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
        if(!auth("testApi")->check()) {
            return response()->json([
                "status_code" => 401,
                "success" => false,
                "messages" => ["Your token is not valid"],
                "data" => []
            ])->header("Content_Type","application/json");
        }
        return $next($request);
    }
}
