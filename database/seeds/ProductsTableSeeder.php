<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public static $aProducts = [
        1 => [
            'name' => 'The Matrix Trilogy 1',
            'client_id' => '1',
            'price_usd' => '30',
        ],
        2 => [
            'name' => 'The Matrix Trilogy 2',
            'client_id' => '1',
            'price_usd' => '31',
        ],
        3 => [
            'name' => 'The Matrix Trilogy 3',
            'client_id' => '1',
            'price_usd' => '32',
        ],
        4 => [
            'name' => 'The Matrix Trilogy 4',
            'client_id' => '1',
            'price_usd' => '33',
        ],
        5 => [
            'name' => 'The Matrix Trilogy 5',
            'client_id' => '1',
            'price_usd' => '34',
        ],
        6 => [
            'name' => 'The Matrix Trilogy 6',
            'client_id' => '1',
            'price_usd' => '35',
        ],
        7 => [
            'name' => 'The Matrix Trilogy 7',
            'client_id' => '1',
            'price_usd' => '36',
        ],
        8 => [
            'name' => 'The Matrix Trilogy 8',
            'client_id' => '1',
            'price_usd' => '37',
        ],
        9 => [
            'name' => 'The Matrix Trilogy 9',
            'client_id' => '1',
            'price_usd' => '38',
        ],
        10 => [
            'name' => 'The Matrix Trilogy 10',
            'client_id' => '1',
            'price_usd' => '39',
        ],
        11 => [
            'name' => 'The Matrix Trilogy 11',
            'client_id' => '1',
            'price_usd' => '40',
        ],
        12 => [
            'name' => 'The Matrix Trilogy 12',
            'client_id' => '1',
            'price_usd' => '41',
        ],
        13 => [
            'name' => 'The Matrix Trilogy 13',
            'client_id' => '1',
            'price_usd' => '42',
        ],
        14 => [
            'name' => 'The Matrix Trilogy 14',
            'client_id' => '1',
            'price_usd' => '43',
        ],
        15 => [
            'name' => 'The Matrix Trilogy 15',
            'client_id' => '1',
            'price_usd' => '44',
        ],
        16 => [
            'name' => 'The Matrix Trilogy 16',
            'client_id' => '1',
            'price_usd' => '45',
        ],
        17 => [
            'name' => 'The Matrix Trilogy 17',
            'client_id' => '1',
            'price_usd' => '46',
        ],
        18 => [
            'name' => 'The Matrix Trilogy 18',
            'client_id' => '1',
            'price_usd' => '47',
        ],
        19 => [
            'name' => 'The Matrix Trilogy 19',
            'client_id' => '1',
            'price_usd' => '48',
        ],
        20 => [
            'name' => 'Macbook Air 1',
            'client_id' => '2',
            'price_usd' => '1200',
        ],
        21 => [
            'name' => 'Macbook Air 2',
            'client_id' => '2',
            'price_usd' => '1201',
        ],
        22 => [
            'name' => 'Macbook Air 3',
            'client_id' => '2',
            'price_usd' => '1202',
        ],
        23 => [
            'name' => 'Macbook Air 4',
            'client_id' => '2',
            'price_usd' => '1203',
        ],
        24 => [
            'name' => 'Macbook Air 5',
            'client_id' => '2',
            'price_usd' => '1204',
        ],
        25 => [
            'name' => 'Macbook Air 6',
            'client_id' => '2',
            'price_usd' => '1205',
        ],
        26 => [
            'name' => 'Macbook Air 7',
            'client_id' => '2',
            'price_usd' => '1206',
        ],
        27 => [
            'name' => 'Macbook Air 8',
            'client_id' => '2',
            'price_usd' => '1207',
        ],
        28 => [
            'name' => 'Macbook Air 9',
            'client_id' => '2',
            'price_usd' => '1208',
        ],
        29 => [
            'name' => 'Macbook Air 10',
            'client_id' => '2',
            'price_usd' => '1209',
        ],
        30 => [
            'name' => 'Macbook Air 11',
            'client_id' => '2',
            'price_usd' => '1210',
        ],
        31 => [
            'name' => 'Macbook Air 12',
            'client_id' => '2',
            'price_usd' => '1211',
        ],
        32 => [
            'name' => 'Macbook Air 13',
            'client_id' => '2',
            'price_usd' => '1212',
        ],
        33 => [
            'name' => 'Macbook Air 14',
            'client_id' => '2',
            'price_usd' => '1213',
        ],
        34 => [
            'name' => 'Macbook Air 15',
            'client_id' => '2',
            'price_usd' => '1214',
        ],
        35 => [
            'name' => 'Macbook Air 16',
            'client_id' => '2',
            'price_usd' => '1215',
        ],
        36 => [
            'name' => 'Macbook Air 17',
            'client_id' => '2',
            'price_usd' => '1216',
        ],
        37 => [
            'name' => 'Macbook Air 18',
            'client_id' => '2',
            'price_usd' => '1217',
        ],
        38 => [
            'name' => 'Macbook Air 19',
            'client_id' => '2',
            'price_usd' => '1218',
        ],
        39 => [
            'name' => 'Server Rack',
            'client_id' => '3',
            'price_usd' => '10000',
        ],
        40 => [
            'name' => 'Server Farm',
            'client_id' => '3',
            'price_usd' => '100000',
        ],
        41 => [
            'name' => 'Watch',
            'client_id' => '3',
            'price_usd' => '399',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$aProducts as $product_id => $product) {
            DB::table('products')->insert([
                'id' => $product_id,
                'name' => $product['name'],
                'client_id' => $product['client_id'],
                'price_usd' => $product['price_usd'],
            ]);
        }
    }
}
