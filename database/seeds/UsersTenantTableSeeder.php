<?php

use Illuminate\Database\Seeder;

class UsersTenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\UserTenant::class, 1)->create([
            'email' => 'client1@teste.com',
            'password' => 'client1',
            'empresa_id' => 1
        ]);

        factory(\App\Models\UserTenant::class, 1)->create([
            'email' => 'client2@teste.com',
            'password' => 'client2',
            'empresa_id' => 2
        ]);
    }
}
