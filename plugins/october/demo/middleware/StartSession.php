<?php

namespace October\Demo\Middleware;

use Closure;

/**
 * middle for testing
 */
class StartSession
{
  public function handle($request, Closure $next)
  {
      session()->put('foo', input('foo'));
      logger('StartSession: foo: ', [session('foo')]);
      return $next($request);
  }
}
