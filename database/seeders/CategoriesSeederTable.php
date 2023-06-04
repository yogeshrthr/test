<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesSeederTable=[
            ['id'=>1,'parent_id'=>0,'section_id'=>2, 'category_name'=>'man','category_image'=>'',
            'category_discount'=>'','description'=>'','url'=>'mans','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>2,'parent_id'=>0,'section_id'=>2, 'category_name'=>'woman','category_image'=>'',
            'category_discount'=>'','description'=>'','url'=>'womans','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>3,'parent_id'=>0,'section_id'=>2, 'category_name'=>'kids','category_image'=>'',
            'category_discount'=>'','description'=>'','url'=>'kids','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
        ];
        //  , , , , , , , ,  and status
        Category::insert($categoriesSeederTable);
    }
}
