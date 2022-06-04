<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Salade verte',
                'category_id' => '1',
                'description' => "Une salade verte",
                'price' => '7.99'
            ],
            [
                'name' => 'Salade jaune',
                'category_id' => '1',
                'description' => "Une salade jaune",
                'price' => '7.99'
            ],
            [
                'name' => 'Salade rouge',
                'category_id' => '1',
                'description' => "Une salade rouge",
                'price' => '7.99'
            ],
            [
                'name' => 'Salade bleu',
                'category_id' => '1',
                'description' => "Une salade bleu",
                'price' => '7.99'
            ],
            [
                'name' => 'Salade dorée',
                'category_id' => '1',
                'description' => "Une salade en or",
                'price' => '10'
            ],
            [
                'name' => 'Burger verte',
                'category_id' => '2',
                'description' => "Un burger verte",
                'price' => '9.99'
            ],
            [
                'name' => 'Burger jaune',
                'category_id' => '2',
                'description' => "Un burger jaune",
                'price' => '9.99'
            ],
            [
                'name' => 'Burger rouge',
                'category_id' => '2',
                'description' => "Un burger rouge",
                'price' => '9.99'
            ],
            [
                'name' => 'Burger bleu',
                'category_id' => '2',
                'description' => "Un burger bleu",
                'price' => '9.99'
            ],
            [
                'name' => 'Burger dorée',
                'category_id' => '2',
                'description' => "Un burger en or",
                'price' => '17'
            ],
            [
                'name' => 'Glace bleu',
                'category_id' => '3',
                'description' => "Une glace bleu",
                'price' => '4.90'
            ],
            [
                'name' => 'Glace dorée',
                'category_id' => '3',
                'description' => "Une glace en or",
                'price' => '7'
            ],
            [
                'name' => 'Soda',
                'category_id' => '4',
                'description' => "Une boisson bien fraîche",
                'price' => '1.50'
            ],
            [
                'name' => 'Vin',
                'category_id' => '4',
                'description' => "Bordeaux 2022",
                'price' => '5'
            ],
            [
                'name' => 'Chocolat chaud',
                'category_id' => '4',
                'description' => "Pour les enfants",
                'price' => '2'
            ],
        ];

        foreach ($products as $product) {
            try {
                $tmp_product = Product::firstOrCreate([
                    'name' => $product['name'],
                    'category_id' => $product['category_id'],
                    'description' => $product['description'],
                    'price' => $product['price']
                ]);
            } catch (\Exception $exception) {
                if ($exception->getCode() == "23000") {
                    dump('Product "' . $product['name'] . '" already exist');
                } else {
                    dump($exception->getMessage());
                }
            }
        }
    }
}
