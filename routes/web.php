<?php

use App\Http\Controllers\CategoriesController;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
Route::get('admin/adminlogout' ,'AdminController@admin_logout');


Route::get('/admin/login','Auth\AdminLoginController@showloginForm');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::get('/admin/profile/edit','AdminsController@edit_profile');
Route::get('/admin/changepass','AdminsController@changepass');
Route::post('/admin/passwordchange','AdminsController@passwordchange');
Route::get('/admin/avatar/update','AdminsController@avatarupdate');
Route::post('/admin/avat/update','AdminsController@updateavatar');
Route::get('/admin/profile/change','AdminsController@changeprofile');
Route::post('/admin/change/profile','AdminsController@profilechange');
Route::get('admin/assignment', 'AssignmentController@index');
Route::prefix('admin')->group(function () {
    // Permisssion Routes
    // Route::get('permission','PermissionController@index');
    // Route::get('permission/add','PermissionController@add');
    // Route::post('permission/create','PermissionController@create');
    // Route::get('permission/edit/{id}','PermissionController@edit');
    // Route::post('permission/update/{id}','PermissionController@update');
    // Route::get('permission/delete/{id}','PermissionController@delete');

    // // Role Route
    // Route::get('roles','RoleController@index');
    // Route::get('role/add','RoleController@add');
    // Route::post('role/create','RoleController@create');
    // Route::get('role/edit/{id}','RoleController@edit');
    // Route::post('role/update/{id}','RoleController@update');
    // Route::get('role/delete/{id}','RoleController@delete');

    // User Route
    Route::get('user','UserController@index');
    Route::get('user/add','UserController@add');
    Route::get('user/edit/{id}','UserController@editprofile');
    Route::get('user/delete/{id}','UserController@delete');
    Route::get('user/profile/{id}','UserController@profile');
    Route::post('user/create','UserController@create');
    Route::get('user/editprofile/{id}','UserController@editprofile');
    Route::post('user/changeprofile/{id}','UserController@changeprofile');
    Route::get('user/editpassword/{id}','UserController@editpassword');
    Route::post('user/changepassword/{id}','UserController@changepassword');
    Route::get('/user/updateavat/{id}','UserController@avatarupdate');
    Route::post('user/avatupdate/{id}','UserController@update_user_avatar');

    // CateGories Routes
    Route::get('categories','CategoriesController@index');
    Route::get('categories/add','CategoriesController@add');
    Route::post('category/create','CategoriesController@create');
    Route::get('category/edit/{id}' , 'CategoriesController@edit');
    Route::post('category/update/{id}','CategoriesController@update');
    Route::get('category/details/{id}','CategoriesController@details');
    Route::get('category/delete/{id}','CategoriesController@delete');
    // Brands Routs
    Route::get('brands','BrandsController@index');
    Route::get('brands/add','BrandsController@add');
    Route::post('brands/create','BrandsController@create');
    Route::get('brands/edit/{id}','BrandsController@edit');
    Route::post('brands/update/{id}','BrandsController@update');
    Route::get('brands/delete/{id}','BrandsController@delete');
    // proucts Routes
    Route::get('products','ProductsController@index');
    Route::get('products/add','ProductsController@add');
    Route::post('products/create','ProductsController@create');
    Route::get('products/edit/{id}','ProductsController@edit');
    Route::post('products/update/{id}','ProductsController@update');
    Route::get('products/delete/{id}','ProductsController@delete');
    Route::get('products/view/{id}','ProductsController@view');
    Route::post('products/primary','ProductsController@makeprimary');
    Route::post('products/prdremove','ProductsController@remove');
    Route::post('attribute/creates','AttributeController@createattr');
    Route::post('attribute/get_terms','AttributeController@get_terms');
    // Testing Routes
    Route::get('products/addon','ProductsController@addon');
    Route::get('orders/list','ProductsController@orderlist');
    Route::get('orders/installer','ProductsController@installer');
    Route::get('product/list','ProductsController@productslist');
    Route::get('productdetail','ProductsController@productdetail');
    
  
    Route::get('orderdetails','ProductsController@orderdetails');
    Route::get('orderconfirm','ProductsController@orderconfirm');
    Route::get('requesthiring/details','ProductsController@hiredetails');
    Route::get('editinstaller','ProductsController@editinstaller');
    Route::get('customer','ProductsController@customer');
    Route::get('addcustomer','ProductsController@addcustomer');
    Route::get('editcustomer','ProductsController@editcustomer');
    Route::get('editproduct','ProductsController@editproduct');
    // Attirbute Routes
    Route::get('attributes','AttributeController@index');
    Route::get('attributes/add','AttributeController@add');
    Route::post('attributes/create','AttributeController@create');
    Route::get('attributes/edit/{id}','AttributeController@edit');
    Route::post('attributes/update/{id}','AttributeController@update');
    Route::get('attributes/delete/{id}','AttributeController@delete');
    // Prodcut Attributes Routes
    Route::get('productattribute','ProductattributeController@index');
    Route::get('productattribute/add','ProductattributeController@add');
    Route::post('productattribute/create','ProductattributeController@create');
    Route::post('productattribute/update/{id}','ProductattributeController@update');
    Route::post('productattribute/getattribute','ProductattributeController@attribute');
    Route::get('productattribute/edit/{id}','ProductattributeController@edit');
    Route::get('productattribute/delete/{id}','ProductattributeController@delete');
    // Product Size Routes 
    Route::get('productsize','ProductsizeController@index');
    Route::get('productsize/add','ProductsizeController@add');
    Route::post('productsize/create','ProductsizeController@create');
    Route::get('productsize/edit/{id}','ProductsizeController@edit');
    Route::post('productsize/update/{id}','ProductsizeController@update');
    Route::get('productsize/delete/{id}','ProductsizeController@delete');


    // Order Management Routes
    Route::get('orders','OrdersController@index');
    Route::post('checkorder','OrdersController@checkorder');
    Route::get('orderdetails/{id}','OrdersController@orderdetaails');
    
    // Product Addon Route
    Route::get('addon','AddonController@create');
    Route::post('create_addon','AddonController@store');

    // Request Hiring Route For Admin Side 
    Route::get('requesthiring','RequestHiringController@index');
    Route::post('hirestatus','RequestHiringController@change_hirestatus');
    Route::get('hiringdetails/{id}','RequestHiringController@hiringdetails');
    // Installers Route
    
    Route::get('installer','InstallerController@index');
    Route::get('addinstaller','InstallerController@add');
    Route::post('createinstaller','InstallerController@create');
    Route::get('editinstaller/{id}','InstallerController@edit');
    Route::post('updateinstaller/{id}','InstallerController@update');
    Route::get('installerdetails/{id}','InstallerController@details');
    Route::get('delteinstaller/{id}','InstallerController@delete');
    Route::post('installeravatar/{id}','InstallerController@updloadprofile');
    Route::post('updateinstallerinfo/{id}','InstallerController@update_instllerinfo');
    Route::post('updatecompanylogo/{id}','InstallerController@update_company_logo');
    Route::post('updatecompanycover/{id}','InstallerController@update_company_cover');
    Route::post('updatecompanydata/{id}','InstallerController@update_company_data');
    Route::get('installerpassword/{id}','InstallerController@installerpassword');
    Route::post('chngeinstallerpwd/{id}','InstallerController@changepassword');
    
});

// Public Routes
Route::get('/','IndexController@index');
Route::get('productdetails/{id}','IndexController@product_details');
Route::post('addtocart/{id}','IndexController@addtocart');
Route::post('countproduct','IndexController@countproduct');
Route::get("productcart",'IndexController@productcart');
Route::post('removecartproduct','IndexController@removecartproduct');
Route::post('updatecartproduct','IndexController@updatecartproduct');
Route::get('checkout','IndexController@checkout');
Route::get('checkout','IndexController@checkout');
Route::post('checkoutsubmit','IndexController@checkoutsubmit');

Route::get('installerlist','IndexController@installerlist');
Route::get('installerdetails/{id}','IndexController@installerdetails');

Route::post('hirerequest','IndexController@hirerequest');
Route::post('get_installer','IndexController@get_installer');

// Customr Routes are here
Route::prefix('customer')->group(function () {
    Route::get('profile/edit','CustomerController@editprofile');
    Route::get('avatar/update','CustomerController@updateavatar');
    Route::post('avat/update','CustomerController@changeavatar');
    Route::get('profile/change','CustomerController@changeprofile');
    Route::post('change/profile','CustomerController@profilechange');
    Route::get('changepass','CustomerController@changepass');
    Route::post('passwordchange','CustomerController@passwrdchange');
    Route::get('installer','CustomerController@installerlist');
    Route::get('installerdetails/{id}','CustomerController@installerdetails');
    Route::post('hirerequest','CustomerController@hireinstaller');
    Route::get('orders','CustomerController@orders');
    Route::get('orderdetails/{id}','CustomerController@orderdetails');
    Route::get('requests','CustomerController@requests');
    Route::get('requestdetails/{id}','CustomerController@requestsdetails');

});
