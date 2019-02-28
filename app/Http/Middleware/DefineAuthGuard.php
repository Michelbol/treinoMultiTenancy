<?php

namespace App\Http\Middleware;

use App\Tenant\TenantManager;
use Closure;

class DefineAuthGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tenant = new TenantManager();
        if($tenant->isSubdomainException()){
            config([
                'auth.defaults.guard' => 'web',
                'auth.defaults.passwords'=> 'users'
            ]);
        }
        return $next($request);
    }
}
