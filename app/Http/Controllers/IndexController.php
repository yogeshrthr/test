<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Products;

class IndexController extends Controller
{
    public function Index(){
        // dd(Products::getDescountPrice(3));
        $banners=Banner::where(['type'=>'slider','status'=>1])->get()->toArray();
        $staticBanner=Banner::where(['type'=>'static','status'=>1])->get()->toArray();
        $newArrivel=Products::where('status',1)->inRandomOrder()->orderBy('id','desc')->limit(10)->get()->toArray();
        $bestSellers=Products::where(['status'=>1,'is_bestseller'=>'yes'])->inRandomOrder()->get()->toArray();
        $isfeature=Products::where(['status'=>1,'is_featured'=>'yes'])->inRandomOrder()->get()->toArray();
        $discount=Products::where('product_discount','>',0)->where(['status'=>1])->inRandomOrder()->get()->toArray();
        

        return view('front.index')->with(compact('banners','staticBanner','newArrivel','bestSellers','discount','isfeature'));
    }
}
