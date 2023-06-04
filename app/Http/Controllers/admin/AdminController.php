<?php

namespace App\Http\Controllers\admin;
// some
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetail;
use App\Models\VendorsBankDetail;
use Session;


class AdminController extends Controller
{
    public function dashborad(){
        session::put('page','dashboard');
        return view('admin.dashboard');
    }
    public function UpadteVendorStatus(Request $request){
        if($request->status=='checked'){
            
            Admin::where('id',$request->admin_id)->update(['status'=>0]);
            
        }else{
            
            Admin::where('id',$request->admin_id)->update(['status'=>1]);
        }
        
        // return response()->json(['status'=>200,'resp'=>$request->admin_id,'status'=>$request->status]);
    }
    
    
    public function ViwVendorDetails($id){
        $vendorDetails=Admin::with('vendorBusiness','vendorBank')->where('id',$id)->first()->toArray();
        // dd($vendorDetails);
        session::put('page','admindetails');
        return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
    }
    public function GetAdminDetails($type=null){
        if($type){
            
            $AdminDetails = Admin::where('type',$type)->get()->toArray();
        
            $type=$type."s";
        }else{
            $AdminDetails = Admin::all()->toArray();
        }
        session::put('page','admindetails');
        return view('admin.admins.view_admins')->with(compact('type','AdminDetails'));
        
    }
    
    public function UpdateVendorDetails(Request $request,$id){
        if($id=="personal"){
            $vendorDetails=Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
           
            if($request->isMethod('post')){
                $data=$request->all();
                // dd($request->all());
                $rules=[
                            'vendor_name'=>'regex:/^[\pL\s\-]+$/u',
                            'vendor_mobile'    => 'numeric',
                            'vendor_pincode'    => 'numeric',
                        ];
                $custom_message=[
                    'vendor_name.regex'=>'Please enter Only alphabate',
                    'vendor_mobile.numeric'=>'Please enter Only numbers',
                    'vendor_pincode.numeric'=>'Please enter Only numbers',
                ];
                $this->validate($request,$rules,$custom_message);
    
                $this->validate($request, [
                    // check validtion for image or file
                            'vendor_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                        ]);
                    // upload images
                if($request->hasFile('vendor_image')){
                    $img_temp=$request->file('vendor_image');
                    $img_name = md5($img_temp->getClientOriginalName() . time()) . "." . $img_temp->getClientOriginalExtension(); //get the  file extention
                    $destinationPath = public_path('admin/images/photos'); //public path folder dir
                    $img_temp->move($destinationPath, $img_name);  //mve to destination you mentioned 
                        //
                        if(!empty(Auth::guard('admin')->user()->image)){
                        
                        @unlink('admin/images/photos/'.Auth::guard('admin')->user()->image);
                        }
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'],'image'=>$img_name,'mobile'=>$data['vendor_mobile']]);
                    Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'address'=>$data['vendor_address'],'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode']]);
                    return redirect()->back()->with("success_message",'Your details is successfully updated');
                }
                // upload details
                Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile']]);
                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'address'=>$data['vendor_address'],'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode']]);
                return redirect()->back()->with("success_message",'Your details is successfully updated');

            }
        }else if($id=="business"){
            $vendorDetails=VendorsBusinessDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            
            if($request->isMethod('post')){
                $data=$request->all();
                // dd($request->all());
                $rules=[
                            'shop_name'=>'regex:/^[\pL\s\-]+$/u',
                            'shop_mobile'    => 'numeric',
                            'shop_pincode'    => 'numeric',
                        ];
                        $custom_message=[
                            'shop_name.regex'=>'Please enter valid shop name',
                            'shop_mobile.numeric'=>'Please enter valid mobile numbers',
                            'shop_pincode.numeric'=>'Please enter valid pincode',
                        ];
                        $this->validate($request,$rules,$custom_message);
            
                        $this->validate($request, [
                            // check validtion for image or file
                                  'address_proof_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                              ]);
                        // upload images
                        if($request->hasFile('address_proof_image')){
                            $img_temp=$request->file('address_proof_image');
                            $img_name = md5($img_temp->getClientOriginalName() . time()) . "." . $img_temp->getClientOriginalExtension(); //get the  file extention
                            $destinationPath = public_path('admin/images/photos/proof'); //public path folder dir
                            $img_temp->move($destinationPath, $img_name);  //mve to destination you mentioned 
                             //
                             if(!empty($vendorDetails['address_proof_image'])){
                              
                                @unlink('admin/images/photos/proof/'.$vendorDetails['address_proof_image']);
                             }
                            // Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'],'image'=>$img_name,'mobile'=>$data['vendor_mobile']]);
                            VendorsBusinessDetail::where('id',Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],'shop_mobile'=>$data['shop_mobile'],
                            'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],'shop_email'=>$data['shop_email'],'shop_website'=>$data['shop_website'],
                            'address_proof'=>$data['address_proof'],'address_proof_image'=>$img_name,'business_license_number'=>$data['business_lic_no'],'gst_number'=>$data['gst_number'],'pan_number'=>$data['pan_number']]);
                            return redirect()->back()->with("success_message",'Your details is successfully updated');
                        }
                        // upload details
                        VendorsBusinessDetail::where('id',Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],'shop_mobile'=>$data['shop_mobile'],
                            'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],'shop_email'=>$data['shop_email'],'shop_website'=>$data['shop_website'],
                            'address_proof'=>$data['address_proof'],'business_license_number'=>$data['business_lic_no'],'gst_number'=>$data['gst_number'],'pan_number'=>$data['pan_number']]);
                        return redirect()->back()->with("success_message",'Your details is successfully updated');

            }
        }else{
            $vendorDetails=VendorsBankDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
             if($request->isMethod('post')){

                $data=$request->all();
                if($data['confirm_account_number']==$data['account_number']){
                    VendorsBankDetail::where('id',Auth::guard('admin')->user()->vendor_id)->update(['bank_name'=>$data['bank_name'],'account_holder_name'=>$data['account_holder_name'],'account_number'=>$data['account_number'],'confirm_account_number'=>$data['confirm_account_number'],'bank_ifsc_code'=>$data['bank_ifsc_code']]);
                    return redirect()->back()->with('success_message',"Your Bank Details is Successfully Updated");
                }else{
                    return redirect()->back()->with('error_message',"account number and confirm account number must be same");
                }
                                
             }
        }
        
        return view('admin.settings.update_vendor_details')->with(compact('id','vendorDetails'));
       
    }
    public function UpdateAdminDetails(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // echo "<pre>";print_r($data);die;
            $rules=[
                'admin_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile'    => 'required|numeric',
            ];
            $custom_message=[
                'admin_name.required'=>'Please enter valid Name',
                'admin_name.regex'=>'Please enter Only alphabate',
                'admin_mobile.required'=>'Please enter valid Name',
                'admin_mobile.numeric'=>'Please enter Only numbers',
            ];
            $this->validate($request,$rules,$custom_message);

            $this->validate($request, [
                // check validtion for image or file
                      'admin_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                  ]);
            // upload images
            if($request->hasFile('admin_image')){
                $img_temp=$request->file('admin_image');
                // $img_name  = $img_temp->getClientOriginalName();
                $img_name = md5($img_temp->getClientOriginalName() . time()) . "." . $img_temp->getClientOriginalExtension(); //get the  file extention
                $destinationPath = public_path('admin/images/photos'); //public path folder dir
                $img_temp->move($destinationPath, $img_name);  //mve to destination you mentioned 
                 //
                 if(!empty(Auth::guard('admin')->user()->image)){
                  
                    @unlink('admin/images/photos/'.Auth::guard('admin')->user()->image);
                 }
                Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'image'=>$img_name,'mobile'=>$data['admin_mobile']]);
                return redirect()->back()->with("success_message",'Your details is successfully updated');
            }
            // upload details
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile']]);
            return redirect()->back()->with("success_message",'Your details is successfully updated');
        }
        session::put('page','setting');
        return view('admin.settings.update_admin_details');
    }
    
    public function UpdateAdminPassword(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
           
            if(!Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
                return redirect()->back()->with('error_message',"Your current password is not Correct");
            }else{
                if($data['confirm_password']!=$data['new_password']){
                    return redirect()->back()->with('error_message',"Password and Confirm Password is must be Same");
                }else{
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>Hash::make($data['new_password'])]);
                    return redirect()->back()->with('success_message',"Your password is updated successfully!!");
                }
            }
            
        }
       $admin_details=Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
       session::put('page','setting');
       return view('admin.settings.update_admin_password')->with(compact('admin_details'));
    }
    public function CheckAdminPassword(Request $request){
        $data=$request->all();
        
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";

        }else{
            return "false";
        }
      
     }
    
    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
           
            
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                
                return redirect('admin/dashboard');
            }else{
                
                return redirect()->back()->with('error_message','Invalid Email or Password');
            }
            
        }

        return view('admin.login');
    }
    public function logout(Request $req){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
