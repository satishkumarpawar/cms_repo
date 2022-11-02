<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UIController;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome');});
Route::get('/refresh-captcha', [FormController::class, 'refreshCaptcha']);
Route::get('/set-language',[UIController::class,'SetLang']);
Route::get('/my-cms-mgmt',[UIController::class,'DBActions']);
//admin routes
Route::name('admin.')->namespace('Admin')->prefix('Accounts')->group(function(){
    Route::match(['get','post'],'/',[AdminController::class,'Login'])->name('login');
Route::middleware(['Admin'])->group(function () {
    Route::get('dashboard',[AdminController::class,'Dashboard'])->name('dashboard');
    Route::get('log-out',[AdminController::class,'Logout'])->name('logout');
    Route::match(['get','post'],'change-password',[AdminController::class,'Change_Password'])->name('password-change');
Route::middleware(['CustomAuth'])->group(function () {
    Route::match(['get','post'],'add-roles',[FormController::class,'Add_Roles'])->name('addRoles');
    Route::get('manage-admin',[AdminController::class,'View_Admins'])->name('manageadmin');
    Route::get('manage-organisation-detail',[AdminController::class,'View_OrganisationDetails'])->name('organisation');
    Route::get('manage-roles',[AdminController::class,'View_Roles'])->name('roles');
    Route::get('delete-Role/{id}',[FormController::class,'Delete_Role']);
    Route::get('manage-options-master',[AdminController::class,'View_OptionMaster'])->name('optionsmaster');
    Route::get('manage-main-menu',[AdminController::class,'View_Menus'])->name('menusetting');
    Route::match(['get','post'],'add-edit-admin/{id?}',[AdminController::class,'Add_Admins'])->name('addadmin');
    Route::match(['get','post'],'add-edit-menu/{id?}',[AdminController::class,'Add_Menu']);
    Route::match(['get','post'],'add-edit-sub-menu/{id?}',[AdminController::class,'Add_SubMenu']);
    Route::get('delete-admin/{id}',[AdminController::class,'Delete_Admin']);
    Route::get('manage-site-setting',[AdminController::class,'View_SiteSetting'])->name('sitesetting');
    Route::match(['get','post'],'Add-Edit-site-setting/{id?}',[AdminController::class,'Add_SiteSetting']);
    Route::get('delete-people/{id}',[FormController::class,'Delete_OrganisationStructure']);
    Route::get('delete-announcements/{id}',[FormController::class,'Delete_Announcement']);
    Route::get('delete-optionsmaster/{id}',[AdminController::class,'Delete_OptionMaster']);
    Route::get('delete-org/{id}',[AdminController::class,'Delete_OrganisationDetails']);
    Route::get('delete-banner/{id}',[AdminController::class,'Delete_Banners']);
    Route::get('delete-usp/{id}',[AdminController::class,'Delete_USP']);
    Route::get('delete-quicklink/{id}',[AdminController::class,'Delete_QuickLink']);
    Route::get('manage-headers',[UIController::class,'MTopBar'])->name('topbar');
    Route::get('manage-banners-sliders',[AdminController::class,'View_Banners'])->name('banners');
    Route::get('file-to-url',[UIController::class,'FileToURL'])->name('filetourl');
    Route::get('manage-usps',[AdminController::class,'View_USPs'])->name('usp');
    Route::get('manage-home-sliders',[UIController::class,'MSliderH'])->name('homeslider');
    Route::get('manage-home-about',[UIController::class,'MAboutH'])->name('homeabout');
    Route::get('manage-footers',[UIController::class,'MFooterS'])->name('footer');
    Route::get('manage-usp-section',[UIController::class,'MUSP'])->name('usps');
    Route::get('manage-upcoming-section',[UIController::class,'MUPC'])->name('upcoming');
    Route::get('manage-gallery-section',[UIController::class,'MHG'])->name('homegallery');
    Route::get('manage-quick-links',[AdminController::class,'View_QuickLinks'])->name('quicklink');
    Route::get('manage-announcement-section',[FormController::class,'View_Announcements'])->name('announcements');
    Route::get('manage-people-section',[FormController::class,'View_OrganisationStructure'])->name('people');
    Route::get('change-status/{status}/{id}',[AdminController::class,'Admin_StatusChange']);
    Route::match(['get','post'],'assign-role/{id}',[FormController::class,'Assign_Roles']);
    Route::match(['get','post'],'add-edit-file2url',[UIController::class,'Add_F2U']);
    Route::match(['get','post'],'create-database',[AdminController::class,'Create_DataBase']);
    Route::match(['get','post'],'permissions/{id}',[FormController::class,'Add_Permissions']);
    Route::match(['get','post'],'add-headers',[UIController::class,'Add_Topbar'])->name('addtopbar');
    Route::match(['get','post'],'add-footers',[UIController::class,'Add_Footbar'])->name('addfooter');
    Route::match(['get','post'],'add-edit-banner/{id?}',[AdminController::class,'Add_Banners'])->name('addBanner');
    Route::match(['get','post'],'add-edit-quicklink/{id?}',[AdminController::class,'Add_QuickLink']);
    Route::match(['get','post'],'add-edit-announcements/{id?}',[FormController::class,'Add_Announcement'])->name('addAnnouncement');
    Route::match(['get','post'],'add-edit-optionsmaster/{id?}',[AdminController::class,'Add_OptionMaster'])->name('addOptionMaster');
    Route::match(['get','post'],'add-edit-usp/{id?}',[AdminController::class,'Add_USP']);
    Route::match(['get','post'],'add-siders',[UIController::class,'Add_MSlider'])->name('addmidbar');
    Route::match(['get','post'],'add-home-about',[UIController::class,'Add_AboutH'])->name('addabout_h');
    Route::match(['get','post'],'add-home-upcoming',[UIController::class,'Add_PCH'])->name('addupcoming');
    Route::match(['get','post'],'add-home-gallery',[UIController::class,'Add_HG'])->name('addhomegallery');
    Route::match(['get','post'],'add-home-usp',[UIController::class,'Add_USP'])->name('addusp');
    Route::match(['get','post'],'add-edit-people/{id?}',[FormController::class,'Add_OrganisationStructure'])->name('addpeople');
    Route::match(['get','post'],'add-edit-org/{id?}',[AdminController::class,'Add_OrganisationDetails'])->name('org');
    Route::get('menu-status-change/{type}/{id}/{status}',[AdminController::class,'Menu_StatusChange']);
    Route::get('status-change/{status}/{id}/{db}',[AdminController::class,'StatusChange']);
    Route::post('form-creation',[UIController::class,'CreateForm']);
    Route::match(['get','post'],'dynamic-form',[UIController::class,'CForm']);
});
});
    Route::match(['get','post'],'forgot-password',[AdminController::class,'ForgotPSW'])->name('forgotpsw');
});




//Route::get('/{page}/{slug?}',[UIController::class,'Front']);

