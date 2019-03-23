<?php

namespace App\Http\Middleware;

use Closure;
// use App\Transformers\originalAttribute;

class TransformInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $transformer)
    {
        $transformedInput = [];

        foreach ($request->request->all() as $input => $value) {
            $transformedInput[] = $value;
        }

        $request->replace($transformedInput);

        return $next($request);
    }
}
