<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            'Pemkab',
            'Kominfo',
        ];

        foreach ($clients as $client) {
            Client::create(['name' => $client]);
        }
    }
}
