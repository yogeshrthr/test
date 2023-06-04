<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionContorller;
use App\Http\Controllers\IndexController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [IndexController::class,'Index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Route::get('/admin/dashboard','App\Http\Controllers\Admin\AdminController@dashborad');
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    // admin login
    
    
    Route::match(['get','post'],'login','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
        // admin dashboard route
        Route::get('dashboard','AdminController@dashborad');
        // admin logout route
        Route::get('logout','AdminController@logout');
        // update password
        Route::match(['get','post'],'update-admin-password','AdminController@UpdateAdminPassword');
        // update details
        Route::match(['get','post'],'update-admin-details','AdminController@UpdateAdminDetails');
        // update vendr details
        Route::match(['get','post'],'update-vendor-details/{id}','AdminController@UpdateVendorDetails');
        // fetch details of admins 
        Route::get('admins/{type?}','AdminController@GetAdminDetails');
        // for viewing full details of vendor
        Route::get('view-vendor-details/{id}','AdminController@ViwVendorDetails');
        // updater admin status
        Route::post('update-admin-status','AdminController@UpadteVendorStatus');
        // check admin password 
        Route::post('check-admin-password','AdminController@CheckAdminPassword');
        // url:'/admin/check-current-password',

        //sections route ************************************/////////
        // open page 
        Route::get('sections','SectionContorller@section');
        // update seciton status 
        Route::post('update-section-status','SectionContorller@UpadteSectionStatus');
        // delete section
        Route::post('delete-section','SectionContorller@DeleteSection');
        // edit add section
        Route::match(['get','post'],'add-edit-section/{id?}','SectionContorller@AddEditSection');
        
        // category route ********************************************/////////
        Route::get('category','CategoryController@Category');
        // update category status
        Route::post('update-category-status','CategoryController@UpadteCategoryStatus');
        // add edit category
        Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@AddEditCategory');
        // delete catogery
        Route::post('delete-category','CategoryController@DeleteCategory');
        // get category level
        Route::post('get-category-level','CategoryController@GetCategoryLevel');
        
        //Brands route ************************************/////////
        // open page 
        Route::get('brands','BrandsController@Brands');
        // update brands status 
        Route::post('update-brands-status','BrandsController@UpadteBrandsStatus');
        // delete brands
        Route::post('delete-brands','BrandsController@DeleteBrands');
        // edit add brands
        Route::match(['get','post'],'add-edit-brands/{id?}','BrandsController@AddEditBrands');
        
        //products route ************************************/////////
        // open page 
        Route::get('products','ProductsController@Products');
        // update products status 
        Route::post('update-products-status','ProductsController@UpadteProductsStatus');
        // delete products
        Route::post('delete-products','ProductsController@DeleteProducts');
        // edit add products
        Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@AddEditProduct');
        
        
        // update attribute status *********************
        Route::post('update-attribute-status','ProductAtrributeController@UpadteAttributeStatus');
        Route::match(['get','post'],'add-edit-attributes/{id?}','ProductAtrributeController@AddEditProductAttributes');
        
        // Images status *********************
        Route::post('update-image-status','ProductImagesController@UpadteImagesStatus');
        Route::match(['get','post'],'add-edit-image/{id}','ProductImagesController@AddEditImages');
        Route::post('delete-image','ProductImagesController@DeleteImages');


        //**** */ banner routes**************
        Route::get('banners','BannerController@Banner');
        
        // update banner status 
        Route::post('update-banner-status','BannerController@UpadteBannersStatus');
        // delete banner
        Route::post('delete-banners','BannerController@DeleteBanner');
        // edit add banner
        Route::match(['get','post'],'add-edit-banner/{id?}','BannerController@AddEditBanners');
    });


    // for front route
    route::namespace('App\Http\Controllers\Front')->group(function(){
        Route::get('/', 'IndexController@Index');

    });
    
   
});


