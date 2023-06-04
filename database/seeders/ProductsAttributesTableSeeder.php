<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productArrtibute=[
            ['id'=>1,'product_id'=>1,'size'=>'Medium','price'=>1500.0,'stock'=>10,'sku'=>'ocf12',
            'status'=>1,
            ],
            
        ];
        ProductsAttribute::insert($productArrtibute);
    }
}
