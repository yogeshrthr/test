<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerImagesInfo=[
                ['id'=>1,'name'=>'banner-1.png','alt'=>'banner-1-image','title'=>'0','type'=>'slider','link'=>'javascirpt::void(0)','status'=>1

                ],
                ['id'=>2,'name'=>'banner-2.png','alt'=>'banner-2-image','title'=> '0','type'=>'slider','link'=>'javascirpt::void(0)','status'=>1

                ],
        ];
        Banner::insert($bannerImagesInfo);
    }
}
