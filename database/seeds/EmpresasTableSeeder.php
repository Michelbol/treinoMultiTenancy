<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Empresa::class, 1)->create([
            'name' => 'Empresa 1',
            'subdomain' => 'client1'
        ]);

        factory(\App\Models\Empresa::class, 1)->create([
            'name' => 'Empresa 2',
            'subdomain' => 'client2'
        ]);
    }
}
