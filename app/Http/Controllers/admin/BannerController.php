<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App\Models\Banner;
use Image;

class BannerController extends Controller
{
    public function Banner(){
        $banner=Banner::get()->toArray();
        // $staticBanner=Banner::where(['type'=>'static','status'=>1])->get()->toArray();
        Session::put('page','banner');
        return view('admin.banner.banner')->with(compact('banner'));
    }
    public function UpadteBannersStatus(Request $request){
        if($request->status=='checked'){
            
            Banner::where('id',$request->banner_id)->update(['status'=>0]);
            
        }else{
            
            Banner::where('id',$request->banner_id)->update(['status'=>1]);
        }
        
        return response()->json(['status'=>200,'message'=>'Status Changed']);
    }
    public function DeleteBanner(Request $req){
        
        echo"<br>";
        print_r(Banner::where('id',$req->module_id)->first(['name'])->name);
        // die;

        if(file_exists('front/images/bannerImages/'.Banner::where('id',$req->module_id)->first(['name'])->name)){
            @unlink('front/images/bannerImages/'.Banner::where('id',$req->module_id)->first(['name'])->name);
            
        }
        
        Banner::where('id',$req->module_id)->delete();
        return back()->with('message','Banner deleted successfully');
    }
    public function AddEditBanners(Request $req,$id=null){
        // $productsDetails=Banner::get()->toArray();
        // $productsDetails=Banner::get()->toArray();
        
        
        if($id){
            $title="Edit Banner";
            $bannerDetails=Banner::find($id);
            // dd($products);
            $mesage="Banner Updated Successfully";

        }else{
            $title="Add Banner";
            $bannerDetails= new Banner;
            $mesage="Banner Added Successfully";
            
            
        }
        if($req->isMethod('post')){      
        
            $this->validate($req, [
                // check validtion for image or file
                        'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    ]);
                // upload images
            if($req->hasFile('image')){
                
                $img_temp=$req->file('image');
                
                $img_name = $img_temp->getClientOriginalName() . rand(11111,99999) . "." . $img_temp->getClientOriginalExtension(); //get the  file extention
                $path = public_path('front/images/bannerImages/'); //public path folder dir
                
                // $img_temp->move($destinationPath, $img_name);
                  //mve to destination you mentioned 

                // Image::make($img_temp->getRealPath())->resize(250,250)->save($samllPath.$img_name);
                // Image::make($img_temp)->resize(500,500)->save($mediumPath.$img_name);
                if($req->type=='static')
                Image::make($img_temp)->resize(1920,450)->save($path.$img_name);
                else
                Image::make($img_temp)->resize(1920,720)->save($path.$img_name);
                
                    //
                    if(file_exists('front/images/bannerImages/'.$bannerDetails->name)){
                    
                    @unlink('front/images/bannerImages/'.$bannerDetails->name);
                  
                    }
                
                    $bannerDetails->name=$img_name ;
            }
       
           
            
           
            
            $bannerDetails->type=$req->type;
            $bannerDetails->alt=$req->alt;
            $bannerDetails->link=$req->link;
            $bannerDetails->title=$req->title;
            $bannerDetails->title=$req->title;
            $bannerDetails->status=1;
            $bannerDetails->save();
           
            
            return redirect('/admin/banners')->with('message',$mesage);
        }
        Session::put('page','banner');
        return view('admin.banner.add-edit-banner')->with(compact('bannerDetails','title'));
    }
}
