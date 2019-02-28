<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/02/2019
 * Time: 23:10
 */
return [
    'model' => \App\Models\Empresa::class,
    'field_name' => 'subdomain',
    'foreign_key' => 'empresa_id',
    'route_param' => 'empresa',
    'subdomains_except' => [
        'master'
    ]
];