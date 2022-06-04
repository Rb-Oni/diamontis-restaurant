<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Entrée'
            ],
            [
                'name' => 'Plat'
            ],
            [
                'name' => 'Déssert'
            ],
            [
                'name' => 'Boisson'
            ]
        ];

        foreach ($categories as $category) {
            try {
                Category::firstOrCreate([
                    'name' => $category['name']
                ]);
            } catch (\Exception $exception) {
                if ($exception->getCode() == "23000") {
                    dump('Category "' . $category['name'] . '" already exist');
                } else {
                    dump($exception->getMessage());
                }
            }
        }
    }
}
