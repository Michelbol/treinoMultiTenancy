<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento3
 * Date: 28/02/2019
 * Time: 10:16
 */

if(!function_exists('routeTenant')){
    function routeTenant($name, $params = [], $absolute = true){
        $tenantManager = app(\App\Tenant\TenantManager::class);
        return route($name, $params+[ config('tenant.route_param') => $tenantManager->routeParam() ], $absolute);
    }
}