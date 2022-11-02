<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('987654321'),
            'status' => 1,
        ]);
         \App\Models\Org::insert([
            'name' => 'Echt Tech',
            'name_h' => 'Echt Tech',
            'address' => 'New Delhi',
            'address_h' => 'New Delhi',
            'contact' => '7557590075',
            'email' => 'superadmin@gmail.com',
            'logo' => 'echttech.png',
            'fevicon' => 'echttech.png',
        ]);
       DB::table('roles')->insert([
            'name' => 'Super Admin',
            'guard_name' => 'admin',
        ]);
       DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' =>'App\Models\Admin',
            'model_id' => 1,
       ]);


         \App\Models\OptionsDump::insert([
        [   'main' => 'Banner/Sliders',
            'option' => 'Front Images',
            'table_name' => 'banner_sliders',
        ],
        [
            'main' => 'Banner/Sliders',
            'option' => 'Client Logos',
            'table_name' => 'banner_sliders',
        ],
        [
            'main' => 'Banner/Sliders',
            'option' => 'Banners',
            'table_name' => 'banner_sliders',
        ],
        [
            'main' => 'Organisation Structure',
            'option' => 'Who is Who',
             'table_name' => 'organisation_structures',
        ],

        [
            'main' => 'Announcements',
            'option' => 'Notifications',
            'table_name' => 'announcements',
        ],

         [
            'main' => 'Announcements',
            'option' => 'Circulars',
            'table_name' => 'announcements',
        ],

         [
            'main' => 'Announcements',
            'option' => 'Latest Updates',
            'table_name' => 'announcements',
        ],

         [
            'main' => 'Announcements',
            'option' => 'Events',
            'table_name' => 'announcements',
        ],
        
        ]);

          \App\Models\URLList::insert([
        [  
             'url' => 'front-images',
             'table_name' => 'banner_sliders',
             'type'=>'Front Images'
        ],

         [  
             'url' => 'client-logos',
             'table_name' => 'banner_sliders',
             'type'=>'Client Logos'
        ],

         [  
             'url' => 'banners',
             'table_name' => 'banner_sliders',
             'type'=>'Banners'
        ],

         [  
             'url' => 'who-is-who',
             'table_name' => 'organisation_structures',
             'type'=>'Who is Who'
        ],

           [  
             'url' => 'notifications',
             'table_name' => 'announcements',
             'type'=>'Notifications'
        ],

           [  
             'url' => 'circulars',
             'table_name' => 'announcements',
             'type'=>'Circulars'
        ],

          [  
             'url' => 'latest-updates',
             'table_name' => 'announcements',
             'type'=>'Latest Updates'
        ],

          [  
             'url' => 'events',
             'table_name' => 'announcements',
             'type'=>'Events'
        ],

        ]);
    }
}
