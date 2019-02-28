<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;

trait TenantModels
{

    protected static function boot(){

        parent::boot();

        static::addGlobalScope(new TenantScopes());
        dd(\Request::route(config('tenant.route_param')));

        static::creating(function(Model $model){

        });
    }
}