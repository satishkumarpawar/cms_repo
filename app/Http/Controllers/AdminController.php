<?php

namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\OptionsDump;
use App\Models\FunctionList;
use App\Models\Org;
use App\Models\BannerSlider;
use App\Models\SiteSetting;
use App\Models\MainMenu;
use App\Models\SubMenu;
use App\Models\SiteLayout;
use App\Models\USP;
use App\Models\QuickLink;
use App\Models\URLList;
use DB;
use Hash;
use Spatie\Permission\Models\Role;
use Session;
use App;
use Str;


class AdminController extends Controller
{ 
    function StatusChange($status,$id,$db){
        DB::table($db)->where('id',dDecrypt($id))->update(['status'=>$status]);
        return redirect()->back()->with('success','Status Changed Successfully');
    }

    function Menu_StatusChange($type,$id,$status){
        if($type=='menu'){
            if($status==0){
                MainMenu::find(dDecrypt($id))->update(['status'=>1]);
            }
            else{
            $data=SubMenu::where('menu_id',dDecrypt($id))->where('status',1)->get();
            if(count($data) > 0){
                return redirect()->back()->with('error','One of the child sub menu is active');
            }
            else{
                MainMenu::find(dDecrypt($id))->update(['status'=>0]);
            }
            }
        }
        else{
            if($status==0){
            $a=SubMenu::find(dDecrypt($id));
            $a1=MainMenu::find($a->menu_id);
            if($a1->status==0){
                return redirect()->back()->with('error','Main menu must be active');
            }
            else{
            SubMenu::find(dDecrypt($id))->update(['status'=>1]);}
            }
            else{
            SubMenu::find(dDecrypt($id))->update(['status'=>0]);
            }
        }
        return redirect()->back()->with('success','status changed successfully');

    }

    function View_USPs(){
        $data=USP::orderBy('id','DESC')->cursor();
        return view('admin.sections.manage_usps',compact('data'));
    }

    function View_QuickLinks(){
        $data=QuickLink::orderBy('id','DESC')->cursor();
        return view('admin.sections.manage_quicklinks',compact('data'));
    }

    function Add_QuickLink(Request $request,$id=null){
        $data1=URLList::orderBy('type','ASC')->GroupBy('type')->cursor();
        if($id){
            $title="Edit QuickLink";
            $data=QuickLink::find(dDecrypt($id));
            $msg="QuickLink Edited Successfully";
        }
        else{
            $title="Add QuickLink";
            $data=new QuickLink;
            $msg="QuickLink Added Successfully";
        }
        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'title'=>'required',   
            ]);
            }
            else{
                 $request->validate([
                'title'=>'required|unique:quick_links',
                'image'=>'required|mimes:jpg,jpeg,gif,png|dimensions:min_height=45,max_height=45,min_width=45,max_width=45',
            ]);
            }
            $data->title=$request->title;
            $data->title_h=$request->title_h;
            $data->url=$request->url;
            if($request->hasFile('image')){
                $path=public_path('uploads/');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
            $data->save();
            return redirect()->route('admin.quicklink')->with('success',$msg);
        }
        return view('admin.sections.add_quicklink',compact('data','id','title','data1'));

    }

    function Add_USP(Request $request,$id=null){
          $data1=URLList::orderBy('type','ASC')->groupBy('type')->cursor();
        if($id){
            $title="Edit USP";
            $data=USP::find(dDecrypt($id));
            $msg="USP Edited Successfully";
        }
        else{
            $title="Add USP";
            $data=new USP;
            $msg="USP Added Successfully";
        }
        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'name'=>'required',
                'url'=>'required'
            ]);
            }
            else{
                 $request->validate([
                'name'=>'required',
                'url'=>'required',
                'image'=>'required|mimes:jpg,jpeg,gif,png|dimensions:min_height=45,max_height=45,min_width=45,max_width=45',
            ]);
            }
            $data->name=$request->name;
            $data->name_h=$request->name_h;
            $data->url=$request->url;
            if($request->hasFile('image')){
                $path=public_path('uploads/');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
            $data->save();
            return redirect()->route('admin.usp')->with('success',$msg);
        }
        return view('admin.sections.add_usp',compact('data','id','title','data1'));
    }

    function Delete_USP($id){
        USP::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }

    function Delete_QuickLink($id){
        QuickLink::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }


    function View_SiteSetting(Request $request){
        $data=SiteSetting::orderBy('id','ASC')->cursor();
        return view('admin.sections.siteSetting',compact('data'));
    }

    function Add_SiteSetting(Request $request,$id=null){
        $f=SiteLayout::where('type','Footer')->orderBy('id','DESC')->cursor();
        $h=SiteLayout::where('type','Header')->orderBy('id','DESC')->cursor();
        $s=SiteLayout::where('type','Slider')->orderBy('id','DESC')->cursor();
        $a=SiteLayout::where('type','About')->orderBy('id','DESC')->cursor();
        $d=SiteLayout::where('type','USP')->orderBy('id','DESC')->cursor();
        $u=SiteLayout::where('type','Upcoming')->orderBy('id','DESC')->cursor();
        $g=SiteLayout::where('type','Gallery')->orderBy('id','DESC')->cursor();
        if($id){
            $title='Edit Site Settings';
            $msg='Records Updated Successfully';
            $data1=SiteSetting::find(dDecrypt($id));
        }
        else{
            $title='Add Site Settings';
            $msg='Records Added Successfully';
            $data1=new SiteSetting;
        }
            if($request->isMethod('post')){
                $request->validate([
                    'page_type'=>'required',
                ]);
                
                $data1->header= $request->header;
                $data1->footer= $request->footer;
                $data1->section1= $request->section1;
                $data1->section2= $request->section2;
                $data1->section3= $request->section3;
                $data1->section4= $request->section4;
                $data1->section5= $request->section5;
                $data1->section6= $request->section6;
                $data1->page_type= $request->page_type;
                $data1->save();
                return redirect('Accounts/manage-site-setting')->with('success',$msg);
            }
        return view('admin.sections.editsiteSetting',['data'=>$data1,'id'=>$id,'title'=>$title,'footer'=>$f,'header'=>$h,'slider'=>$s,'about'=>$a,'usp'=>$d,'upcom'=>$u,'gall'=>$g]);
    }

    function View_Menus(){
        return view('admin.sections.Menus');
    }

    function Add_Menu(Request $request,$id=null){
        $data2=URLList::orderBy('type','ASC')->groupBy('type')->cursor();
        if($id){
            $data=MainMenu::find(dDecrypt($id));
            $title='Edit New Main Menu';
            $msg='Main Menu Edited Successfully ';   
        }
        else{
            $data=new MainMenu;
            $title='Add New Main Menu';
            $msg='Main Menu Added Successfully ';
        }
        if($request->isMethod('post')){
            if(!$id){
            $request->validate([
                'name'=>'required|unique:main_menus',
            ]);
            }
             else{
                  $request->validate([
                'name'=>'required', 
            ]);
            }
            $data->name=$request->name;
            $data->name_h=$request->name_h;
            if($request->has('external')){
                $data->external= $request->external;
                $data->url=rtrim($request->url1,'/');
            }
            else{
                $data->url=url($request->url);
            }
            $data->slug=SlugCheck('main_menus',$request->name);
            $data->save();
            return redirect()->route('admin.menusetting')->with('success',$msg);
        }
        return view('admin.sections.addMenus')->with(compact('data','title','id','data2'));
    }

    function Add_SubMenu(Request $request,$id=null){
        $data1=MainMenu::orderBy('name','ASC')->cursor();
        if($id){
            $data=SubMenu::find(dDecrypt($id));
            $title='Edit New Sub Menu';
            $msg='Sub Menu Edited Successfully ';   
        }
        else{
            $data=new SubMenu;
            $title='Add New Sub Menu';
            $msg='Sub Menu Added Successfully ';
        }
        if($request->isMethod('post')){
            if(!$id){
            $request->validate([
                'name'=>'required|unique:sub_menus',
                'menu_id'=>'required'
            ]);}
            else{
            $request->validate([
                'name'=>'required',
                'menu_id'=>'required'
            ]);
            }
            $data->name=$request->name;
            $data->name_h=$request->name_h;
            $data->menu_id=$request->menu_id;
            $data01=MainMenu::find($request->menu_id);
            if($request->has('external')){
                $data->external= $request->external;
                $data->url=rtrim($request->url,'/');
            }
            else{
                $data->url=$data01->url.'/'.Str::slug($request->name);
            }
            $data->slug=SlugCheck('sub_menus',$request->name);
            $data->save();
            return redirect()->route('admin.menusetting')->with('success',$msg);
        }
        return view('admin.sections.addSubMenus')->with(compact('data1','data','title','id'));
    }

    function View_Banners(){
        $data=BannerSlider::orderBy('id','DESC')->cursor();
        return view('admin.sections.BannerSlider',compact('data'));
    }

    function Add_Banners(Request $request,$id=null){
        if($id){
            $title="Edit Banner/Slider";
            $msg="Banner/Slider Edited Successfully!";
            $data=BannerSlider::find(dDecrypt($id));
        }
        else{
             $title="Add Banner/Slider";
            $msg="Banner/Slider Added Successfully!";
            $data=new BannerSlider;
        }
        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'title'=>'required',
                'type'=>'required',
            ]);
            }
            else{
                if($request->type=="Banners"){
                $request->validate([
                'title'=>'required|unique:banner_sliders',
                'type'=>'required',
                'image'=>'required|mimes:png,jpg,ico|dimensions:min_height=470',
            ]);
            }
                else{
                $request->validate([
                'title'=>'required|unique:banner_sliders',
                'type'=>'required',
                'image'=>'required|mimes:png,jpg,ico',
            ]);
                }
            }
            $data->title=ucwords($request->title);
            $data->title_h=$request->title_h;
            $data->type=$request->type;
            $data->short=$request->short;
            $data->short_h=$request->short_h;
            $path=public_path('uploads/');
            if($request->hasFile('image')){
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
            if($request->has('external')){
                $data->external= $request->external;
                $data->url=rtrim($request->url,'/');
            }
            else{
                $data->url=Str::slug($request->name);
            }
            $data->save();
            return redirect()->route('admin.banners')->with('success',$msg);
        }
        return view('admin.sections.addBannerSlider',compact('data','title','id'));
    }

    function Delete_Banners($id){
         $data=BannerSlider::find(dDecrypt($id))->delete();
          return redirect()->back()->with('success','Record Deleted Successfully');
    }

    function View_OrganisationDetails(){
        $data=Org::cursor();
        return view('admin.sections.Organisation',compact('data'));
    }

    function Add_OrganisationDetails(Request $request,$id=null){
        if($id){
            $title="Edit Organisation Details";
            $msg="Organisation Details Edited Successfully!";
            $data=Org::find(dDecrypt($id));
        }
        else{
             $title="Add Organisation Details";
            $msg="Organisation Details Added Successfully!";
            $data=new Org;
        }

        if($request->isMethod('post')){
			if($id){
            $request->validate([
                'name'=>'required',
                'contact'=>'required',
                'email'=>'required',   
            ]);}
			else{ $request->validate([
                'name'=>'required',
                'logo'=>'required|mimes:png,jpg,ico|dimensions:max_height=130px',
                'fevicon'=>'required|mimes:png,jpg,ico',
                'contact'=>'required',
                'email'=>'required',   
            ]);}
            $data->name=ucwords($request->name);
            $data->name_h=$request->name_h;
            $data->about_h=$request->about_h;
            $data->about=$request->about;
            $data->address=ucwords($request->address);
            $data->address_h=$request->address_h;
            $data->email=$request->email;
            $data->contact=$request->contact;
            $data->location=$request->location;
            $data->facebook=$request->facebook;
            $data->twitter=$request->twitter;
            $data->instagram=$request->instagram;
            $data->linkedin=$request->linkedin;
            $data->youtube=$request->youtube;
            $data->pintrest=$request->pintrest;
            $data->url_logo2=$request->url_logo2;
            $data->url_logo3=$request->url_logo3;
            $path=public_path('uploads/');
            if($request->hasFile('logo')){
                $file=$request->file('logo');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->logo= $newname;
            }
            if($request->hasFile('logo2')){
                $file2=$request->file('logo2');
                $newname2= time().rand(10,99).'.'.$file2->getClientOriginalExtension();
                $file2->move($path, $newname2);
                $data->logo2= $newname2;
            }
            if($request->hasFile('logo3')){
                $file3=$request->file('logo3');
                $newname3= time().rand(10,99).'.'.$file3->getClientOriginalExtension();
                $file3->move($path, $newname3);
                $data->logo3= $newname3;
            }
             if($request->hasFile('fevicon')){
                $file1=$request->file('fevicon');
                $newname1= time().rand(10,99).'.'.$file1->getClientOriginalExtension();
                $file1->move($path, $newname1);
                $data->fevicon= $newname1;
            }
            $data->save();
            return redirect()->route('admin.organisation')->with('success',$msg);
        }
        return view('admin.sections.addOrganisation',compact('data','title','id'));
    }

    function Add_OptionMaster(Request $request,$id=null){
        $data1=OptionsDump::groupBy('main')->get();
        if($id){
            $title="Edit Option Master";
            $msg="Option Master Edited Successfully!";
            $data=OptionsDump::find(dDecrypt($id));
        }
        else{
            $title="Add Option Master";
            $msg="Option Master Added Successfully!";
            $data=new OptionsDump;
        }
        if($request->isMethod('post')){
            $request->validate([
                'option'=>'required',
                'main'=>'required',
            ]);
            if (!Schema::hasTable(Str::plural(strtolower(Str::snake($request->main, '_')))) || !Schema::hasTable('dynamic#'.Str::plural(strtolower(Str::snake($request->main, '_'))))) {
            return redirect('/Accounts/create-database')->with('error','Create database first');
            }
            $data2=OptionsDump::where('option',ucwords($request->option))->first();
            $data21=OptionsDump::where('main',ucwords($request->main))->first();
            if(!$data2){
                $data3=new URLList;
                $data3->url=Str::slug(Str::plural($request->option));
                $data3->type=Str::plural(ucwords($request->option));
                $data3->table_name=$data21->table_name;
                $data3->save();
            }
            $data->option=ucwords(Str::plural($request->option));
            $data->main=ucwords($request->main);
            $data->table_name=$data21->table_name;
            $data->save();
            return redirect()->route('admin.optionsmaster')->with('success',$msg);
        }
        return view('admin.Layout.addOptionsMaster',compact('data','title','id','data1'));
    }

    function Delete_OptionMaster($id){
          $data=OptionsDump::find(dDecrypt($id))->delete();
          return redirect()->back()->with('success','Record Deleted Successfully');
    }

     function Delete_OrganisationDetails($id){
          $data=Org::find(dDecrypt($id))->delete();
          return redirect()->back()->with('success','Record Deleted Successfully');
    }

    function Login(Request $request)
    {
        $title='Admin login  ';
        if(\Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        if($request->isMethod('post')){
            $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
            ]);
            if(\Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password,'status'=>1])){
                $data=Admin::find(\Auth::guard('admin')->user()->id);
                $data->update(['login_time'=>date('d-m-Y H:i:s'),'ip'=>$request->ip()]);
                return redirect()->route('admin.dashboard')->with('success','Hello '.$data->name.'. Welcome to admin panel !');
            }
            else{
                return redirect()->route('admin.login')->with('error','Invalid Credentials');
            }
        }
        return view('admin.index')->with(compact('title'));
    }

    function Dashboard(){
        $title='Admin Dashboard ';
        return view('admin.dashboard')->with(compact('title'));
    }

    function View_OptionMaster(){
        $data=OptionsDump::whereNotNull('option')->orderBy('id','DESC')->cursor();
        return view('admin.Layout.OptionMaster',compact('data'));
    }

    function Change_Password(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'password'=>'required',
                'retype_password'=>'required|same:password',
            ]);
            Admin::find(\Auth::guard('admin')->user()->id)->update(['password'=>Hash::make($request->password)]);
            return redirect()->back()->with('success','Password Changed Successfully!');
        }
        return view('admin.users.change_pass');
    }

    function Logout(Request $request){
        $data=Admin::find(\Auth::guard('admin')->user()->id);
        $login_t=$data->login_time;
        $data->update(['last_login_time'=>$login_t,'logout_time'=>date('d-m-Y H:i:s'),'ip'=>$request->ip()]);
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Logged Out successfully !');
    }

    function View_Admins(Request $request){
        $user=Admin::find(\Auth::guard('admin')->user()->id);
        $title='Manage Users ';
        $data=Admin::where('id','!=',1)->orderBy('id','DESC')->cursor();
        return view('admin.users.manageUser')->with(compact('data','title'));
    }

    function View_Roles(){
        $title='Manage Roles';
        $data=Role::where('name','!=','Super Admin')->orderBy('name','ASC')->cursor();
        return view('admin.users.manageRoles')->with(compact('data','title'));
    }

    function Add_Admins(Request $request,$id=null){
        if($id){
            $title='Edit User ';
            $msg= 'User Edited Successfully !';
            $data= Admin::find(dDecrypt($id)); 
        }
        else{
            $title='Add User';
            $msg= 'User Added Successfully !';
            $data= new Admin; 
        }
        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'name'=>'required',
                'email' =>'required',
                'mobile' =>'required'
            ]);
            }
            else{
                 $request->validate([
                'name'=>'required',
                'email' =>'required | unique:admins',
                'mobile' =>'required'
            ]); 
            }
            $data->name= ucwords($request->name);
            $data->mobile= $request->mobile;
            $data->email= $request->email;
            if(!$id){
            //$password=rand(10000,99999);
            $password=12345678;
            $data->password= Hash::make($password);
            //mail
            }
            $data->save();
            return redirect()->route('admin.manageadmin')->with('success',$msg);
        }
        return view('admin.users.add-admin')->with(compact('data','title','id'));
    }

    function Delete_Admin($id){
        Admin::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Admin Entry Deleted Successfully!');
    }

    function ForgotPSW(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'email'=>'required',
                'captcha' => 'required|captcha'
            ]);
            $data=Admin::where('email',$request->email)->where('status',1)->first();
            if($data){
                $password=rand(10000,99999);
                $data->update(['password'=>Hash::make($password)]);
                    //mail
                return redirect()->back()->with('success','New password sent on your mail !');
            }
            else{
                 return redirect()->back()->with('error','Invalid user id !');
            }
        }
         return view('admin.forgotpsw');
    }

    function Admin_StatusChange($status,$id){
            Admin::find(dDecrypt($id))->update(['status'=>$status]);
            return redirect()->back()->with('success','Status Changed Successfully!');
    }

    function Create_DataBase(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'db'=>'required',
                'type'=>'required',
                'col_name'=>'required',
            ]);
            //dd($request->all());
            if(Schema::hasTable(Str::plural(strtolower(Str::snake(str_replace('-',' ',str_replace("_",' ',$request->db)))))) || Schema::hasTable('dynamic#'.Str::plural(strtolower(Str::snake(str_replace('-',' ',str_replace("_",' ',$request->db))))))){
                return redirect()->back()->with('error','Table already exits');
            }
            Schema::create('dynamic#'.Str::plural(strtolower(Str::snake(str_replace('-',' ',str_replace("_",' ',$request->db))))), function($table) use ($request)
            {           
              $table->id();
                for($i=0;$i < count($request->type);$i++){
                    $fn='file'.$i;
                    $dn='dropdown'.$i;
                    if($request->type[$i]=='Varchar'){
                        if($request->$fn){
                            $name11='file#'.str_replace(' ','_',strtolower($request->col_name[$i]));
                        }
                        else{
                            $name11='text#'.str_replace(' ','_',strtolower($request->col_name[$i]));
                        }
                     $table->string($name11)->nullable();
                     }
                    else if($request->type[$i]=='Text'){
                     $table->longText('textarea#'.str_replace(' ','_',strtolower($request->col_name[$i])))->nullable();
                     }
                    else if($request->type[$i]=='Integer'){
                        if($request->$dn){
                            $name1='dropdown#'.str_replace(' ','_',strtolower($request->col_name[$i])).'#'.$request->dbn[$i];
                        }
                        else{
                            $name1='integer#'.str_replace(' ','_',strtolower($request->col_name[$i]));
                        }
                     $table->bigInteger($name1)->nullable();
                     }
                }
              $table->timestamps();
            });
            OptionsDump::insert([
                'main'=>ucwords($request->db),
                'type'=>'custom',
                'table_name'=>'dynamic#'.Str::plural(strtolower(Str::snake(str_replace('-',' ',str_replace("_",' ',$request->db)))))

            ]);
            return redirect()->route('admin.optionsmaster')->with('success','DB Created Successfully, Now Proceed ahead');
        }
        return view('admin.Layout.add_db');
    }
//end
}
