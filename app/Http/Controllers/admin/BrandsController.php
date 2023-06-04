<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use Session;


// use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function Brands(){
        $brandsDetails=Brands::get()->toArray();
        // echo "<pre>";print_r($brandsDetails);die;
        Session::put('page','catalouge');
        return view('admin.brands.brands')->with(compact('brandsDetails'));
    }
    public function UpadteBrandsStatus(Request $req){
        if($req->status=='checked'){
            
            Brands::where('id',$req->brands_id)->update(['status'=>0]);
            
        }else{
            
            Brands::where('id',$req->brands_id)->update(['status'=>1]);
        }

    }
    public function DeleteBrands(Request $req){
        Brands::where('id',$req->module_id)->delete();
        

        return back()->with('message','Brand deleted successfully');
    }
    public function AddEditBrands(Request $req,$id=null){
        if($id){
            $brands=Brands::find($id);
            $brands->first();
            $message="Brands updated successfully";
            $title="Edit Brands";
            
        }else{
            $brands=new Brands;
            $message="Brands added Successfully";
            $title="Add Brands";
        }
        if($req->isMethod('post')){
            
            
                
                $rules=[
                    'brandName'=>'regex:/^[\pL\s\-]+$/u',
                    'brandName' => 'min:2',
                    
                ];
                $custom_message=[
                    
                    // 'brandName.regex'=>'Please enter Only alphabate',

                    'brandName.regex'=>'Please enter Only alphabate',
                    'brandName.min'=>'Please make sure enter valid Brand name'
                ];
                $this->validate($req,$rules,$custom_message);
            

            $brands->name=$req->brandName;
            if(!empty($brands->status) && $brands->status == 0 or $brands->status == 1 ){
                $status=$brands->status;
            }else{
                $status=1;
            }
            $brands->status = $status;
            $brands->save();
            return redirect('admin/brands')->with('message',$message);
            
        }
        
        session::put('page','catalouge');
        return view('admin.brands.add-edit-brands')->with(compact('brands','title'));

    }
}
