<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use App\Models\sections;

class CategoryController extends Controller
{
    public function category(){
        $categoryDetails=Category::with(['section','parentcategory'])->get()->toArray();
        // dd($categoryDetails);
        Session::put('page','catalouge');
        return view('admin.category.category')->with(compact('categoryDetails'));
    }
    public function UpadteCategoryStatus(Request $req){
        if($req->status=='checked'){
            
            category::where('id',$req->category_id)->update(['status'=>0]);
            
        }else{
            
            category::where('id',$req->category_id)->update(['status'=>1]);
        }

    }
    public function AddEditCategory(Request $req, $id=null){
        $section=sections::get()->toArray();
        
        if($id){
            $category=category::where('id',$id)->first();
            // $getCategory=category::with('subCategory')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
            $getCategory=category::with('subCategory')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get()->toArray();
            $message="Category updated successfully!";
            $title="Edit Category";
            // print_r($getCategory[0]->category_name);
            // echo "<pre>";print_r($getCategory);die;

        }else{
            $getCategory=[];
            $category= new category;
            $message="Category Added successfully!";
            $title="Add Category";
        }
        if($req->isMethod('post')){
            
            // $rules=[
            //     'category_name'=>'required|regex:/^[\pL\s\-]+$/u|min:2',
            // ];
            // $custom_message=[
            //     'category_name.regex'=>'Please enter Only alphabate',
            //     'category_name.required'=>'Please make sure  enter correct name'
            // ];
            // $this->validate($req,$rules,$custom_message);
            // dd($req->all());
            
            if($req->hasFile('sectionImage')){
                $img_temp=$req->file('sectionImage');
                $img_name = md5($img_temp->getClientOriginalName() . time()) . "." . $img_temp->getClientOriginalExtension(); //get the  file extention
                $destinationPath = public_path('front/images/categoryImages/'); //public path folder dir
                $img_temp->move($destinationPath, $img_name);  //mve to destination you mentioned 
                 
                if(!empty($category['category_image'])){
                              
                    @unlink('front/images/categoryImages/'.$category['category_image']);
                 }
                //  return redirect()->back()->with("success_message",'Your details is successfully updated');
            }else{
                if(!empty($category['category_image'])){
                    $img_name=$category['category_image'];
                }else{
                    $this->validate($req, [
                        // check validtion for image or file
                              'categoryImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                          ]);
                }
            }
            // echo strip_tags($req->sectionName);die;
            
            $category->category_name=strip_tags($req->sectionName);
            $category->section_id=$req->categorySection;
            $category->parent_id=$req->categoryLevel;
            $category->category_image=$img_name;
            if(isset($req->category_discount)){
                $category->category_discount = $req->category_discount;
            }else{
                $category->category_discount =null;
            }
            
            $category->description=$req->description;
            $category->url=$req->url;
            $category->meta_title=$req->meta_title;
            $category->meta_description=$req->meta_description;
            $category->meta_keywords=$req->meta_keywords;
            $category->status=1;
            $category->save();
            return redirect('admin/category')->with('message',$message);


        }
        
        session::put('page','catalouge');
        return view('admin.category.add-edit-category')->with(compact('category','section','title','message','getCategory'));

    }
    public function DeleteCategory(Request $req){
        category::where('id',$req->module_id)->delete();
        return back()->with('message','Category deleted successfully');
    }
    
    public function GetCategoryLevel(Request $req){
        if($req->ajax()){
            $getCategory=category::with('subCategory')->where(['parent_id'=>0,'section_id'=>$req->section_id])->get()->toArray();
         
        }
        // echo '<pre>';print_r($getCategory);die;
        // echo '<pre>';print_r($getCategory);
        // if(empty($req->category_id)){

        // }
        $category=category::where('id',$req->category_id)->first();
        
        return view('admin.category.add-category-level')->with(compact('getCategory','category'));
        // echo dummy($id,$section_id);
    }
    
    
}
