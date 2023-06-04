<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Products;
use Image;

use Session;

class ProductImagesController extends Controller
{
    public function AddEditImages(Request $req,$id){
        $productDetails=Products::select(['id','product_name','main_image','product_color','product_code'])->with('images')->find($id)->toArray();
    
        Session::put('page','catalouge');
        
        if($req->isMethod('post')){
            if($images=$req->file('images')){
                foreach($images as $index=>$img){
                    // $img_temp=$req->file($img);
                    $img_name = $img->getClientOriginalName() . time() . "." . $img->getClientOriginalExtension(); //get the  file extention
                    $samllPath = public_path('front/images/productImages/s/'); //public path folder dir
                    $mediumPath = public_path('front/images/productImages/m/'); //public path folder dir
                    $largePath = public_path('front/images/productImages/l/'); //public path folder dir
                    // $img_temp->move($destinationPath, $img_name);
                    //mve to destination you mentioned 
                    Image::make($img->getRealPath())->resize(250,250)->save($samllPath.$img_name);
                    Image::make($img)->resize(500,500)->save($mediumPath.$img_name);
                    Image::make($img)->resize(1000,1000)->save($largePath.$img_name);
                    
                        //
                        
                        $newimg= new ProductImage;

                        $newimg->product_id=$id;
                        $newimg->name=$img_name ;
                        $newimg->status=1;
                        $newimg->save();

                        
                }
                
                
            }
            return redirect()->back()->with('message','Image Added Successfully');
        }
        return view('admin.productImage.add_edit_images')->with(compact('productDetails'));
    }
    public function UpadteImagesStatus(Request $request){
        if($request->status=='checked'){
            
            ProductImage::where('id',$request->image_id)->update(['status'=>0]);
            
        }else{
            
            ProductImage::where('id',$request->image_id)->update(['status'=>1]);
        }
        
        return response()->json(['status'=>200,'message'=>'Status Changed']);
    }
    public function DeleteImages(Request $req){
        $productDetails=ProductImage::find($req->module_id);
        @unlink('front/images/productImages/s/'.$productDetails->name);
        @unlink('front/images/productImages/l/'.$productDetails->name);
        @unlink('front/images/productImages/m/'.$productDetails->name);
        ProductImage::where('id',$req->module_id)->delete();


        return back()->with('message','Product deleted successfully');
    }
}
