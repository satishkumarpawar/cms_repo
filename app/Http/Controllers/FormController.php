<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use App\Models\Announcement;
use App\Models\URLList;
use App\Models\OrganisationStructure;
use DB;
use Str;

class FormController extends Controller
{
    function View_OrganisationStructure(){
        $data=OrganisationStructure::orderBy('id','DESC')->cursor();
        return view('admin.sections.OrganisationStructure',compact('data'));
    }

    function Delete_OrganisationStructure($id){
        $data=OrganisationStructure::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }


    function Add_OrganisationStructure(Request $request,$id=null){
        if($id){
            $title="Edit Organisation Structure";
            $msg="Organisation Structure Edited Successfully!";
            $data=OrganisationStructure::find(dDecrypt($id));
        }
        else{
             $title="Add Organisation Structure";
            $msg="Organisation Structure Added Successfully!";
            $data=new OrganisationStructure;
        }

        if($request->isMethod('post')){
            $request->validate([
                'title'=>'required',
                'type'=>'required',
                'phone'=>'required',
                'email'=>'required',
            ]);
            $data->title=ucwords($request->title);
            $data->title_h=$request->title_h;
            $data->description= $request->description;
            $data->description_h= $request->description_h;
            $data->department= $request->department;
            $data->department_h= $request->department_h;
            $data->type=$request->type;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->extension=$request->extension;
            $data->designation= $request->designation;
            $data->designation_h= $request->designation_h;
            $path=public_path('uploads/organisation');
            if($request->hasFile('image')){
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
            
            $data->save();
            return redirect()->route('admin.people')->with('success',$msg);
        }

        return view('admin.sections.addOrganisationStructure',compact('data','title','id'));
    }

     function refreshCaptcha(){
        return response()->json(['captcha'=> captcha_img()]);
    }

    function Delete_Announcement($id){
        $data= Announcement::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }

    function View_Announcements(){
        $data=Announcement::orderBy('id','DESC')->cursor();
        return view('admin.sections.announcements',compact('data'));
    }

    function Add_Announcement(Request $request,$id=null){
        if($id){
            $title="Edit Entry";
            $msg="Entry Edited Successfully!";
            $data=Announcement::find(dDecrypt($id));
        }
        else{
             $title="Add New Entry";
            $msg="New Entry Added Successfully!";
            $data=new Announcement;
        }

        if($request->isMethod('post')){
            $request->validate([
                'title'=>'required',
                'type'=>'required',
                'description'=>'required',
            ]);
            if($request->end_date!='' || $request->end_date!=null){
            if(strtotime($request->start_date) > strtotime($request->end_date)){
                return redirect()->back()->with('error','End date should always be greater than start date');
            }
            }
            $data->title=$request->title;
            $url=URLList::where('type',$request->type)->first();
            $data->slug=$url->url.'/'.SlugCheck('announcements',$request->title);
            $data->title_h=$request->title_h;
            $data->description= $request->description;
            $data->description_h= $request->description_h;
            $data->type=$request->type;
            if($request->start_date!='' || $request->start_date!=null){
            $data->start_date= date('d-m-Y',strtotime($request->start_date));
            $data->start_time= strtotime($request->start_date);
            }
            else{
                 $data->start_date= date('d-m-Y');
                 $data->start_time= time();
            }
           
            $data->end_time= strtotime($request->end_date);
            $data->end_date= date('d-m-Y',strtotime($request->end_date));

            $path=public_path('uploads');
            if($request->hasFile('image')){
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
            if($request->hasFile('document')){
                $file1=$request->file('document');
                $newname1= time().rand(10,99).'.'.$file1->getClientOriginalExtension();
                $file1->move($path, $newname1);
                $data->related_docs= $newname1;
            }
            $data->save();
            return redirect()->route('admin.announcements')->with('success',$msg);
        }

        return view('admin.sections.addAnnouncement',compact('data','title','id'));
    }

    function Delete_Role($id){
        Role::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Role deleted Successfully');
    }

    function Add_Roles(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=> 'required|unique:roles',
            ]);
             if($request->name =='SuperAdmin' || $request->name=='superadmin' || $request->name=='superAdmin' || $request->name=='Superadmin'){
                return redirect()->back()->with('error','action forbidden');
            }
            $data= new Role;
            $data->name= ucwords($request->name);
            $data->guard_name='admin';
            $data->save();
            return redirect()->route('admin.roles')->with('success','Role Added Successfully');
        }
        return view('admin.users.addRole'); 
    }

    function Assign_Roles(Request $request,$id){
        $user=Admin::find(dDecrypt($id));
        $roles=$user->getRoleNames();
        $data=Role::where('name','!=','Super Admin')->orderBy('name','ASC')->cursor();
        if($request->isMethod('post')){
            $request->validate([
                'role'=>'required'
            ]);
            $user->roles()->detach();
            foreach($request->role as $r){
            $user->assignRole($r);
            }
            return redirect()->route('admin.manageadmin')->with('success','Role assigned Successfully to '.$user->name);
        }
        return view('admin.users.assignrole')->with(compact('data','id','user','roles'));
        
    }

    function Add_Permissions(Request $request,$id){
            $roles=Role::find(dDecrypt($id));
            $perms=$roles->getAllPermissions();
            $routes =  \Route::getRoutes();
            foreach ($routes as $value) {
                 if(str_contains($value->getActionname(), 'App\Http\Controllers\AdminController') || str_contains($value->getActionname(), 'App\Http\Controllers\FormController')){
                    $action = explode("@",$value->getActionname());
                 $permissions=Permission::where('name',$action[1])->first();
                 if(!$permissions){
                    Permission::create(['name'=>$action[1],'guard_name'=>'admin']);
                 }
                }   
            }
            $data=Permission::whereNotIn('name', ['Login','refreshCaptcha','Dashboard','Logout','Change_Password','ForgotPSW'])->orderBy('name','ASC')->cursor();
           if($request->isMethod('post')){
            foreach($request->role as $val){
                $per[]= $val;
                }
                $roles->permissions()->sync($per);
                return redirect()->route('admin.roles')->with('success','Permissions Assigned to Role Successfully');
            }
           
            return view('admin.users.permissions')->with(compact('data','id','roles','perms'));
    }


//end
}
