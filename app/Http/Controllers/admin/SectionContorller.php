<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sections;
use Session;

class SectionContorller extends Controller
{
    public function section(){
        $sectionDetails=sections::get()->toArray();
        // dd($section);
        Session::put('page','catalouge');
        return view('admin.section.section')->with(compact('sectionDetails'));
    }
    public function UpadteSectionStatus(Request $request){
        if($request->status=='checked'){
            
            sections::where('id',$request->section_id)->update(['status'=>0]);
            
        }else{
            
            sections::where('id',$request->section_id)->update(['status'=>1]);
        }
        
        return response()->json(['status'=>200,'message'=>'Status Changed']);
    }
    public function DeleteSection(Request $req){
        sections::where('id',$req->module_id)->delete();
        

        return back()->with('message','Section deleted successfully');
    }
    public function AddEditSection(Request $req,$id=null){
        if($id){
            $section=sections::find($id);
            $section->first();
            $message="Section updated successfully";
            $title="Edit Section";
            
        }else{
            $section=new sections;
            $message="Section added Successfully";
            $title="Add Section";
        }
        if($req->isMethod('post')){
            
                $rules=[
                    'sectionName'=>'regex:/^[\pL\s\-]+$/u',
                    'sectionName' => 'min:2',
                    
                ];
                $custom_message=[
                    'sectionName.regex'=>'Please enter Only alphabate',
                    'sectionName.min'=>'Please make sure enter valid name'
                ];
                $this->validate($req,$rules,$custom_message);
            

            $section->name=$req->sectionName;
            $section->status=1;
            $section->save();
            return redirect('admin/sections')->with('message',$message);
            
        }
        
        session::put('page','catalouge');
        return view('admin.section.add-edit-section')->with(compact('section','title'));

    }
    
    
}
