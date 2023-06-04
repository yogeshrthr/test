<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Products;
use App\Models\Category;
use App\Models\sections;
use App\Models\Brands;
use Auth;
use Image;


class ProductsController extends Controller
{
    public function Products(){
        $productsDetails=Products::with(['section'=>function($query){
            $query->select(['id','name']);
        },'category'=>function($query){
            $query->select(['id','category_name']);
        }])->get()->toArray();
        // dd($productsDetails);
        Session::put('page','catalouge');
        return view('admin.products.products')->with(compact('productsDetails'));
    }
    public function UpadteProductsStatus(Request $request){
        if($request->status=='checked'){
            
            Products::where('id',$request->products_id)->update(['status'=>0]);
            
        }else{
            
            Products::where('id',$request->products_id)->update(['status'=>1]);
        }
        
        return response()->json(['status'=>200,'message'=>'Status Changed']);
    }
    public function DeleteBanner(Request $req){
        Products::where('id',$req->module_id)->delete();
        

        return back()->with('message','Product deleted successfully');
    }
    public function AddEditProduct(Request $req,$id=null){
        $productsDetails=sections::with('category')->get()->toArray();
        $brands=Brands::get()->toArray();
        if($id){
            $title="Edit Products";
            $products=Products::find($id);
            // dd($products);
            $mesage="Product Updated Successfully";

        }else{
            $title="Add Products";
            $products= new Products;
            $mesage="Product Added Successfully";
            
            
        }
        if($req->isMethod('post')){
            
        
            
            $rules=[
                        'productName'=>"regex:/^[a-zA-Z]+[0-9]?+[\-'\s]?[a-zA-Z ]+$/",
                        
                        'product_code'=>'alpha_num',
                        'product_color'=>"regex:/^[a-zA-Z]+[\-'\s]?[a-zA-Z ]+$/",
                        
                        
                        // 'produc t_discount'    => 'numeric',

                    ];
            $custom_message=[
                'productName.regex'=>'Please Enter Valid Name',
                'product_code.alpha_num'=>'Please Enter Valid Code',
                'product_color.regex'=>'Please Enter Valid Color Name',
                
            ];
            $this->validate($req,$rules,$custom_message);

            $this->validate($req, [
                // check validtion for image or file
                        'main_image' => 'image|mimes:jpg,png,jpeg,gif,svg',
                    ]);
                // upload images
            if($req->hasFile('main_image')){
                
                $img_temp=$req->file('main_image');
                $img_name = md5($img_temp->getClientOriginalName() . time()) . "." . $img_temp->getClientOriginalExtension(); //get the  file extention
                $samllPath = public_path('front/images/productImages/s/'); //public path folder dir
                $mediumPath = public_path('front/images/productImages/m/'); //public path folder dir
                $largePath = public_path('front/images/productImages/l/'); //public path folder dir
                // $img_temp->move($destinationPath, $img_name);
                  //mve to destination you mentioned 
                Image::make($img_temp->getRealPath())->resize(250,250)->save($samllPath.$img_name);
                Image::make($img_temp)->resize(500,500)->save($mediumPath.$img_name);
                Image::make($img_temp)->resize(1000,1000)->save($largePath.$img_name);
                
                    //
                    if(file_exists('front/images/productImages/s/'.$products->main_image)){
                    
                    @unlink('front/images/productImages/s/'.$products->main_image);
                    @unlink('front/images/productImages/l/'.$products->main_image);
                    @unlink('front/images/productImages/m/'.$products->main_image);
                    }
                
                    $products->main_image=$img_name ;
            }
            // upload video
           
            if($req->hasFile('product_video')){
                
                $img_temp=$req->file('product_video');
                $vdoName = md5($img_temp->getClientOriginalName() . time()) . "." . $img_temp->getClientOriginalExtension(); //get the  file extention
                $vdopath = public_path('front/vdo/productVdo'); //public path folder dir
                //public path folder dir
                $img_temp->move($vdopath,$vdoName);
                
                
                
                  
                
               
                    //
                    if(!empty($products->product_video)){
                    
                    @unlink('front/vdo/productVdo/'.$products->product_video);
                   
                    }
                    $products->product_video=$vdoName;
                
            }
           
            if(empty($req->product_discount)){
                $req->product_discount=null;
            }
            if(empty($req->is_featured)){
                $req->is_featured="no";
            }
            if(empty($req->is_bestseller)){
                $req->is_bestseller="no";
            }
            
            $products->admin_type=Auth::guard('admin')->user()->type;
            $products->admin_id=Auth::guard('admin')->user()->id;
            $products->vendor_id=Auth::guard('admin')->user()->vendor_id;
            $products->section_id=$req->section_id;
            $products->category_id=$req->category_id;
            $products->brand_id=$req->brand_id;
            $products->product_name=$req->productName;
            $products->product_code=$req->product_code;
            $products->product_color=$req->product_color;
            $products->product_price=$req->product_price;
            $products->product_discount= $req->product_discount;
            
            $products->is_bestseller=$req->is_bestseller;
            $products->product_weight=$req->product_weight;
            $products->meta_title=$req->meta_title;
            $products->meta_description=$req->meta_description;
            $products->description=$req->description;
            $products->is_featured=$req->is_featured;
            
           
            
           
            $products->meta_keywords=$req->meta_keywords;
           
            $products->status=1;
            $products->save();
            return redirect('/admin/products')->with('message',$mesage);
        }
        Session::put('page','catalouge');
        return view('admin.products.add-edit-product')->with(compact('productsDetails','title','brands','products'));
    }
    
}
