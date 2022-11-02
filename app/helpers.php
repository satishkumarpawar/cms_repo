<?php 

 function GetLang(){
   return config('app.locale');
}

 function GetVisits(){
    $d=\App\Models\VisitorCount::orderBy('id','DESC')->take(1)->get();
    if(count($d) > 0){
        return $d[0]->counter;
    }
    return 'Yet To Start';
}

 function FindColType($table,$col){
    return \DB::getSchemaBuilder()->getColumnType($table,$col);
}

 function GetLastUpdate(){
    $data=\App\Models\VisitorCount::orderBy('id','DESC')->skip(5)->take(1)->get();
    if(count($data) > 0){
    return @$data[0]->date;
    }
    return date('d-m-Y H:i:s');
}

 function SlugCheck($table,$title){
   $test=\DB::table($table)->where('slug',\Str::slug($title))->exists();
   if($test){
    $slug=\Str::slug($title).'-'.mt_rand(1,10);
   }
   else{
    $slug=\Str::slug($title);
   }
   return $slug;
}

 function SeePermission($function){

	$user=\App\Models\Admin::find(\Auth::guard('admin')->user()->id);

	return $user->hasPermissionTo($function,'admin');

}

 function FindQuickLink(){
      $data=\App\Models\QuickLink::where('status',1)->orderBy('id','DESC')->take(9)->cursor();

       return @$data;

}

 function dEncrypt($value){

      $newkey='AX345678ZX98765Y';

      $newEncrypter = new \Illuminate\Encryption\Encrypter($newkey,'AES-128-CBC');

      return $newEncrypter->encrypt($value);

   }

 function dDecrypt($value){

      $newkey='AX345678ZX98765Y';

      $newEncrypter = new \Illuminate\Encryption\Encrypter($newkey,'AES-128-CBC');

      return $newEncrypter->decrypt($value);

   }



 function GetOptionName($id,$param){

      $data=\App\Models\OptionsDump::find($id);

      return $data->$param;

   }


 function GetOptionsByName($name){

      $data=\App\Models\OptionsDump::where('main',$name)->orderBy('option','ASC')->cursor();

      return $data;

   }



 function GetOrganisationDetails($param){

       $data=\App\Models\Org::first();
       if(strtolower($param) =='name'){
        if(GetLang()=='en'){
            return @$data->name;
        }
        else{
            return @$data->name_h;
        }
       }
      return @$data->$param;

   }



 function FindSiteSettings($page_type,$param){

      $data=\App\Models\SiteSetting::where('page_type',$page_type)->first();

      return @$data->$param;

   }



 function FindBanners($type){

       $data=\App\Models\BannerSlider::where('type',$type)->where('status',1)->orderBy('id','DESC')->cursor();

       return @$data;

   }



 function GetMenu(){

       $data=\App\Models\MainMenu::with('GetSubMenus')->get();

       return @$data;

   }

 function GetUSPs(){
       $data=\App\Models\USP::cursor();

       return @$data;
   }

 function GetActiveUSPs(){
       $data=\App\Models\USP::where('status',1)->cursor();

       return @$data;
   }

 function GetActiveMenu(){

       $data=\App\Models\MainMenu::where('status',1)->with('GetActiveSubMenu')->get();

       return @$data;

   }


 function GetAnnouncements($type){

      $data = \App\Models\Announcement::where('type',$type)->where('status',1)->orderBy('id','DESC')->take(3)->get();

      return $data;

   }

 function FindUniqueDb(){
        $data=\App\Models\OptionsDump::orderBy('main','ASC')->groupBy('main')->cursor();
        return $data;
   }

 function getMonth($x){
    $locale=app()->getLocale();
    if($locale=='en'){
     $month = [
          '01'=>'Jan',
          '02'=>'Feb',
          '03'=>'Mar',
          '04'=>'Apr',
          '05'=>'May',
          '06'=>'Jun',
          '07'=>'Jul',
          '08'=>'Aug',
          '09'=>'Sep',
          '10'=>'Oct',
          '11'=>'Nov',
          '12'=>'Dec'
      ];
    }
    else{
     $month = [
          '01'=>'जनवरी',
          '02'=>'फ़रवरी',
          '03'=>'मार्च',
          '04'=>'अप्रैल',
          '05'=>'मई',
          '06'=>'जून',
          '07'=>'जुलाई',
          '08'=>'अगस्त',
          '09'=>'सितंबर',
          '10'=>'अक्टूबर',
          '11'=>'नवम्बर',
          '12'=>'दिसम्बर'
      ];
    }
    foreach ($month as $K=>$M){
        if($K==$x){
            return $M;
        }
    }
}

 function getdrpVal($id,$name,$colname){
    $data=\App\Models\OptionsDump::find($id);
    $tn=explode('#',$data->table_name);
    $data2=\DB::table($data->table_name)->get();

   if(isset($tn[0]) && $tn[0]=='dynamic'){
    ?>
     <div class="col-md-6">
                <div class="form-group"> <label for="form_name"><?php echo $name;?>*</label>
                <select name="<?php echo $colname;?>" class="form-control" >
                 <option value="">Please Select</option>

    <?php foreach($data2 as $D){ ?>

        <option value="<?php echo $D->id;?>"><?php echo $D->text#title;?></option> <?php } ?>
         </select>
                </div></div>
        <?php 
        }else{ ?>

            <div class="col-md-6">
                <div class="form-group"> <label for="form_name"><?php echo $name;?>*</label>
                <select name="<?php echo $colname;?>" class="form-control" >
                 <option value="">Please Select</option>

    <?php foreach($data2 as $D){ ?>

        <option value="<?php echo $D->id;?>"><?php echo $D->title;?></option> <?php } ?>
         </select>
                </div></div>
        <?php 
        }

        }  


    function TextForm($data,$table){

        foreach($data as $D){
        if($D =='created_at' || $D =='updated_at' || $D =='id'){
            echo ' ';
        }
        else{
        $a=explode('#',$D);
        $name=$a[1];
        $type=FindColType($table,$D);

        if(isset($name)){
        

        if($type=='string'){
            if($a[0]=='file'){
                echo '
                <div class="col-md-6">
                <div class="form-group"> <label for="form_name">'.ucwords($name).'*</label>
                <input type="file" name="'.$D.'" class="form-control" placeholder="please enter '.ucwords($name).'">
                </div></div>';
            }
            else{
                echo '
                <div class="col-md-6">
                <div class="form-group"> <label for="form_name">'.ucwords($name).'*</label>
                <input type="text" name="'.$D.'" class="form-control" placeholder="please enter '.ucwords($name).'">
                </div></div>';
            }
            }
        
           
         }
         }
      }

    }


    function IntegerForm($data,$table){
         foreach($data as $D){
        if($D =='created_at' || $D =='updated_at' || $D =='id'){
            echo ' ';
        }
        else{
        $a=explode('#',$D);
        $name=$a[1];
        $type=FindColType($table,$D);

        if(isset($name)){
        

       
        if($type=='bigint'){
            if($a[0]=='dropdown'){
                getdrpVal($a[2],$name,$D);
            }
            else{
                 echo '
                <div class="col-md-6">
                <div class="form-group"> <label for="form_name">'.ucwords($name).'*</label>
                <input type="number" name="'.$D.'" class="form-control" placeholder="please enter '.ucwords($name).'">
                </div></div>';
            }
            }
         
         }
         }
      }

    }

    function TextareaForm($data,$table){
         foreach($data as $D){
        if($D =='created_at' || $D =='updated_at' || $D =='id'){
            echo ' ';
        }
        else{
        $a=explode('#',$D);
        $name=$a[1];
        $type=FindColType($table,$D);

        if(isset($name)){
        

        
            if($type=='text'){
                echo '
                <div class="col-md-12">
                <div class="form-group"> <label for="form_name">'.ucwords($name).'*</label> 
                <textarea name="'.$D.'" id="ta"> </textarea>
                </div></div><script>CKEDITOR.replace("'.$D.'");</script>';
                
            }
         }
         }
      }

    }
 