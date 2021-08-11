<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RequestLog
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
        $currentDate = Carbon::now();
        $timeStart = microtime(true);

        Log::info("===============");
        Log::info($currentDate . ': BEFORE: ' . $timeStart);

        $response = $next($request);

        $timeEnd = microtime(true);

        Log::info($currentDate . ': AFTER: ' . $timeEnd);
        Log::info($currentDate . ': RESULT: ' . ($timeEnd - $timeStart));

        return $response;
    }
}
