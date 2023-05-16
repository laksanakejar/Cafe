<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class CafebaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Added Start
        $products = [
            [
                'name' => 'Kopi Kavian',
                'image' => 'assets/img/mn (1).jpg',
                'price' => 10000,
                'description' => 'Biji kopi pilihan terdapat didalamnya'
            ],
            [
                'name' => 'Kopi Nako',
                'image' => 'assets/img/kopi 2.jpg',
                'price' => 12000,
                'description' => 'Biji kopi pilihan terdapat didalamnya'
            ],
            [
                'name' => 'Kopi Kampers',
                'image' => 'assets/img/kopi 3.jpg',
                'price' => 45000,
                'description' => 'Biji kopi pilihan terdapat didalamnya'
            ],
            [
                'name' => 'Kopi Hideung',
                'image' => 'assets/img/cofe2.jpg',
                'price' => 40000,
                'description' => 'Biji kopi pilihan terdapat didalamnya'
            ],
            [
                'name' => 'Pizza',
                'image' => 'assets/img/mn(5).jpg',
                'price' => 45000,
                'description' => 'Python Language'
            ],
            [
                'name' => 'Masakan Sunda',
                'image' => 'assets/img/mn (2).jpg',
                'price' => 15000,
                'description' => 'Codeigniter freamwork'
            ],
            [
                'name' => 'Pasta',
                'image' => 'assets/img/mn (3).jpg',
                'price' => 25000,
                'description' => 'Codeigniter freamwork'
            ],
            [
                'name' => 'Creamy truffle',
                'image' => 'assets/img/mn (4).jpeg',
                'price' => 25000,
                'description' => 'Codeigniter freamwork'
            ],
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
        //Added End
    }
}
