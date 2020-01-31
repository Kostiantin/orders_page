<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public static $aClients = [
        'Acme',
        'Apple',
        'Microsoft',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$aClients as $client) {
            DB::table('clients')->insert([
                'name' => $client
            ]);
        }
    }
}
