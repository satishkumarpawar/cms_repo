<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use HasFactory;
      protected $fillable = [
        'status',
      
    ];

    function GetSubMenus(){
        return $this->hasMany(SubMenu::class,'menu_id','id');
    }

    function GetActiveSubMenu(){
        return $this->hasMany(SubMenu::class,'menu_id','id')->where('status',1);
    }
}
