<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    use HasFactory;
    public static function section(){
        $getsections=sections::with('category')->where('status',1)->get()->toArray();
        return $getsections;
    }
    public function category(){
        return $this->hasMany('App\Models\Category','section_id')->where(['status'=>1,'parent_id'=>0])->with('subCategory');
    }
    
}
