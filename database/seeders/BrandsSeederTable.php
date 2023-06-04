<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brands;

class BrandsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $BrandsSeederTable=[
            ['id'=>1,'name'=>'samsung','status'=>1],
            ['id'=>2,'name'=>'LG','status'=>1],
            ['id'=>3,'name'=>'Pooma','status'=>1],
            ['id'=>4,'name'=>'Sparx','status'=>1],
            ['id'=>5,'name'=>'Addidas','status'=>1],
            ['id'=>6,'name'=>'Vivo','status'=>1],
        ];
        //  , , , , , , , ,  and status
        Brands::insert($BrandsSeederTable);
        
    }
}
