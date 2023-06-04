<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sections;

class SectionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionSeederTable=[
            ['id'=>0,'name'=>'Clothes','status'=>1],
            ['id'=>1,'name'=>'Electronics','status'=>1],
            ['id'=>2,'name'=>'Appliences','status'=>1],
        ];
        sections::insert($sectionSeederTable);

    }
}
