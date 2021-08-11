<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckIfPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->input('page') != null) {
            $request->merge(['page' => 1]);
        }
        Log::info($request->input('page'));

        $response = $next($request);

        // if ($request->input('page') > 1) {

        //     $request->merge(['page' => 1]);
        // }
        // Log::info($request->input('page'));

        return $response;
    }
}
