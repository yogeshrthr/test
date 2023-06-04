<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productDetails=[
            ['id'=>1,'category_id'=>16,'section_id'=>2,'brand_id'=>3,
            'vendor_id'=>1,'admin_type'=>'vendor','admin_id'=>2,"product_name"=>"T-shirt",'product_code'=>'tn001',
            'product_color'=>'white','main_image'=>'','description'=>'','product_price'=>1500,
            'product_discount'=>10,'product_weight'=>500,'product_video'=>'',
            'meta_title'=>'','meta_description'=>'','meta_keywords'=>'',
            'is_featured'=>'yes','status'=>1,
            ],
            ['id'=>2,'category_id'=>17,'section_id'=>19,'brand_id'=>7,
            'vendor_id'=>0,'admin_type'=>'superadmin','admin_id'=>1,"product_name"=>"Oppo reno 7",'product_code'=>'opr001',
            'product_color'=>'lightblue','main_image'=>'','description'=>'','product_price'=>17000,
            'product_discount'=>10,'product_weight'=>250,'product_video'=>'',
            'meta_title'=>'','meta_description'=>'','meta_keywords'=>'',
            'is_featured'=>'yes','status'=>1,
            ],
            
        ];
        Products::insert($productDetails);
    }
}