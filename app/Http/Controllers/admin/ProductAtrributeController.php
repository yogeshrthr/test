<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App\Models\Products;
use App\Models\ProductsAttribute;


class ProductAtrributeController extends Controller
{
    public function AddEditProductAttributes(Request $req,$id=null){
        
        if($req->isMethod('post')){
            
            if(empty($id)){
                foreach($req->size as $index=>$size){
                    $attr= new ProductsAttribute;
                    if(ProductsAttribute::where('sku', $req->sku[$index])->count() >0){
                        return redirect()->back()->with('error','This SKU is Already Exist');
                    }
                    
                    $attr->product_id=$req->product_id;
                    $attr->size=$size;
                    $attr->price=$req->price[$index];
                    $attr->sku=$req->sku[$index];
                    $attr->stock=$req->stock[$index];
                    $attr->status=1;
                    $attr->save();
                }
                
                return redirect()->back()->with('message','Attribure add Succefully');
            }else{
               
                $attr =ProductsAttribute::find($id);
                    if(ProductsAttribute::where('sku', $req->sku)->count() >0){
                        return redirect()->back()->with('error','This SKU is Already Exist');
                    }
                    
                    $attr->product_id=$req->product_id;
                    $attr->size=$req->size;
                    $attr->price=$req->price;
                    $attr->sku=$req->sku;
                    $attr->stock=$req->stock;
                    $attr->status=1;
                    $attr->save();
                
                return redirect()->back()->with('message','Attribure Updated Succefully');
                
                
            }
            

            
           
        }
        $attribute=Products::select(['id','product_name','main_image','product_color','product_code'])->with('attribute')->find($id)->toArray();
       

        Session::put('put','catelouge');
      return view('admin.attributes.add-edit-attribute')->with(compact('attribute'));
    }
    public function UpadteAttributeStatus(Request $req){
        if($req->ajax()){
            
            if($req->attribute_status==0){
                ProductsAttribute::where('id',$req->attribute_id)->update(['status'=>0]);
            }else{
                ProductsAttribute::where('id',$req->attribute_id)->update(['status'=>1]);
            }
                
        }

    }
}
