<?php

namespace Caydeesoft\Permission\Middleware;

use Caydeesoft\Permission\Exceptions\UnauthenticatedException;
use Caydeesoft\Permission\Exceptions\UnauthorizedException;
use Caydeesoft\Permission\Models\Permission;
use Closure;
use Illuminate\Http\Request;

class AuthRoles
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws \Throwable
     */
    public function handle($request, Closure $next)
    {

        $guards = collect(config('auth.guards'));

        $authGuard = $guards->keys()->filter(function($key) {
            return auth($key)->check();
        })->first();

        throw_if(!auth($authGuard)->check(), UnauthenticatedException::notLoggedIn());
        $action     =   $request->route()->getActionname();
        $name       =   $request->route()->getName();
        $permission =   auth($authGuard)->user()->permission->where('name',$name)->where('action',$action);

        throw_if(is_null($permission), UnauthorizedException::noPermission());

        return $next($request);
    }
}
