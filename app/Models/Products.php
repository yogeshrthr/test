<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;


class Products extends Model
{
    use HasFactory;
    public function section(){
        return $this->belongsTo('App\Models\sections','section_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function attribute(){
        return $this->hasMany('App\Models\ProductsAttribute','product_id');
    }
    public function images(){
        return $this->hasMany('App\Models\ProductImage','product_id');
    }
    public static function getDescountPrice($product_id){
        $productDetails=Products::select(['product_price','product_discount','category_id'])->where('id',$product_id)->first();
        $productDetails=json_decode(json_encode($productDetails),true);
        $catDetails=category::select(['category_discount'])->where('id',$productDetails['category_id'])->first();
        $catDetails=Json_decode(Json_encode($catDetails),true);
        
        if(!empty($productDetails['product_discount'])){
            $productDescount=($productDetails['product_price']-$productDetails['product_price']*$productDetails['product_discount']/100);
        }else if(!empty($catDetails['category_discount'])){
        
           
            $productDescount=($productDetails['product_price']-$productDetails['product_price']*$catDetails['category_discount']/100);
        }else{
            $productDescount=0;
        }
        return $productDescount;

    }
    

}
