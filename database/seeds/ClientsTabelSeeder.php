<?php

use Illuminate\Database\Seeder;

class ClientsTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $clients = ['samar', 'haniem'];

        foreach ($clients as $client)
        {
            \App\Client::create([
                'name'    => $client,
                'phone'   => '0202348943',
                'address' => 'Egypt',
            ]);
        }
    }
}
