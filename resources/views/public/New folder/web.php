<?php


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

Route::get('/home','HomeController@index')->name('home');
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
//Route::get('/admin', 'AdminController@index');
Route::get('admin/adminlogout' ,'AdminController@admin_logout');
Route::get('availproducts','IndexController@availproducts');
Route::post('subscribe','IndexController@subscribe');
Route::post('checkcoupen','IndexController@checkcoupen');
Route::get('/admin/login','Auth\AdminLoginController@showloginForm')->name('admin/login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::get('/admin/profile/edit','AdminsController@edit_profile');
Route::get('/admin/changepass','AdminsController@changepass');
Route::post('/admin/passwordchange','AdminsController@passwordchange');
Route::get('/admin/avatar/update','AdminsController@avatarupdate');
Route::post('/admin/avat/update','AdminsController@updateavatar');
Route::get('/admin/profile/change','AdminsController@changeprofile');
Route::post('/admin/change/profile','AdminsController@profilechange');
Route::get('admin/assignment', 'AssignmentController@index');
Route::post('quoteforinstaller','IndexController@quoteforinstaller');
Route::post('getmail','IndexController@getmail');
Route::post('prdaddtocart','IndexController@prdaddtocart');

// Door Builder Routes
Route::get('door-build','DoorBuilderController@index');
Route::post('get_colors','DoorBuilderController@get_colors');
Route::post('get_internal_color','DoorBuilderController@get_internalcolors');
Route::post('get_glasses','DoorBuilderController@get_glasses');
Route::post('get_frames','DoorBuilderController@get_frames');
Route::post('get_hinge','DoorBuilderController@get_hinge');

Route::prefix('admin')->group(function () {
    
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
    
    // Routes to chagne the email of the user 
    Route::get('changeaccount' ,'UserController@changeaccount');
    Route::post('changeemail','UserController@changeemail');
    Route::get('verify','UserController@verify');
    Route::post('confirmcode','UserController@checkcode');
    // Customer Routes
    Route::get('customers','AdmincustomerController@index');
    Route::get('customers/add','AdmincustomerController@add');
    Route::post('customers/create','AdmincustomerController@create');
    Route::get('customers/edit/{id}','AdmincustomerController@edit');
    Route::post('customers/update/{id}','AdmincustomerController@update');
    Route::get('customers/delete/{id}','AdmincustomerController@delete');
    Route::get('customers/details/{id}','AdmincustomerController@details');
    Route::get('customers/deactivate/{id}','AdmincustomerController@deactivate');
    Route::get('customers/changepassword/{id}','AdmincustomerController@changepassword');
    Route::get('customerorder/details/{id}','AdmincustomerController@orderdetails');
    Route::post('chngecustomerpwd/{id}','AdmincustomerController@changecustomerpwd');
    // Delivery TIme Routes
    Route::get('deliverytimes','DeliverTimeController@index');
    Route::get('deliverytimes/create','DeliverTimeController@create');
    Route::post('deliverytimes/store','DeliverTimeController@store');
    Route::get('deliverytimes/edit/{id}','DeliverTimeController@edit');
    Route::post('deliverytimes/update/{id}','DeliverTimeController@update');
    Route::get('deliverytimes/delete/{id}','DeliverTimeController@delete');


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
    Route::post('brands/removeimage','BrandsController@removeimage');
    // Products Variety Routes
    Route::get('prdvariety', "PrdVarietyController@index");
    Route::get('prdvariety/create', "PrdVarietyController@create");
    Route::post('prdvariety/store', "PrdVarietyController@store");
    Route::get('prdvariety/edit/{id}', "PrdVarietyController@edit");
    Route::post('prdvariety/update/{id}', "PrdVarietyController@update");
    Route::get('prdvariety/delete/{id}', "PrdVarietyController@delete");
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

    Route::post('products/get_attributess','ProductsController@get_attribute');
    Route::post('products/filter','ProductsController@filter');
    Route::post('products/filterbrand','ProductsController@filterbrand'); 
    Route::get('orders/list','ProductsController@orderlist');
    Route::get('orders/installer','ProductsController@installer');
    Route::get('product/list','ProductsController@productslist');
    Route::get('productdetail','ProductsController@productdetail');
    
   

    Route::get('orderdetails','ProductsController@orderdetails');
   
    Route::get('requesthiring/details','ProductsController@hiredetails');
    Route::get('editinstaller','ProductsController@editinstaller');
    //Route::get('customer','ProductsController@customer');
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
    Route::get('removeprdattribute/{id}','AttributeController@removeproductattribute');
    Route::get('product/addattr/{id}','AttributeController@addattr');
    Route::post('prdattr/create/{id}','AttributeController@createprdattr');
    Route::post('attribute/checkattr','AttributeController@checkattr');
    Route::get('editprdattribute/{id}','AttributeController@editattr');
    Route::post('updateterms','AttributeController@updateattr');
    Route::post('get_prd_terms','AttributeController@get_prd_terms');
    
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
    Route::get('productsize/add/{id}','ProductsizeController@add');
    Route::post('productsize/create/{id}','ProductsizeController@create');
    Route::get('productsize/edit/{id}','ProductsizeController@edit');
    Route::post('productsize/update/{id}','ProductsizeController@update');
    Route::get('productsize/delete/{id}','ProductsizeController@delete');


// Product Variation 
    Route::get('addproductvariation/{id}','ProductsController@addprdvariation');
    Route::post('prdvariation/create/{id}','ProductsController@createvariation');
    Route::get('variation/deletevariation/{id}','ProductsController@deletevariation');
    Route::post('products/chceckvariation','ProductsController@checkvariation');
    // Order Management Routes
    Route::get('orders','OrdersController@index');
    Route::post('checkorder','OrdersController@checkorder');
    Route::get('orderdetails/{id}','OrdersController@orderdetaails');
    Route::get('orderconfirm','OrdersController@orderconfrim');
    
    // Product Add on Types
    Route::get('addontype','AddOnTypController@index');
    Route::get('addontype/create','AddOnTypController@create');
    Route::post('addontype/store','AddOnTypController@store');
    Route::get('addontype/edit/{id}','AddOnTypController@edit');
    Route::post('addontype/update/{id}','AddOnTypController@update');
    Route::get('addontype/delete/{id}','AddOnTypController@delete');
// Colors Routes
    Route::get('colors','ColorController@index');
    Route::get('colors/create','ColorController@create');
    Route::post('colors/store','ColorController@store');
    Route::get('colors/edit/{id}','ColorController@edit');
    Route::post('colors/update/{id}','ColorController@update');
    Route::get('colors/delete/{id}','ColorController@delete');
    
    // Product Addon Route
    Route::get('addon/create','AddonController@create');
    Route::get('addons','AddonController@index');
    Route::get('addon/view/{id}','AddonController@view');
    
    Route::get('addon/edit/{id}','AddonController@edit');
    Route::post('addon/update/{id}','AddonController@update');
    Route::get('addon/delete/{id}','AddonController@delete');
    Route::post('create_addon','AddonController@store');
    Route::get('addframe/{id}','AddonController@addframe');
    Route::post('addon_color','AddonController@createaddoncolor');
    Route::get('addcolor/{id}','AddonController@addcolor');
    Route::get('deletecolor/{id}','AddonController@deletecolor');
    Route::get('editcolor/{id}','AddonController@editcolor');
    Route::post('updatecolor/{id}','AddonController@updatecolor');
    Route::post('createframe','AddonController@createframe');
    Route::get('deleteframe/{id}','AddonController@deleteframe');
    Route::get('editframe/{id}','AddonController@editframe');
    Route::post('updateframe/{id}','AddonController@updateframe');

    // weight slotes
    Route::get('weights','WeightController@index');
    Route::get('weights/create','WeightController@create');
    Route::post('weights/store','WeightController@store');
    Route::get('weights/edit/{id}','WeightController@edit');
    Route::post('weights/update/{id}','WeightController@update');
    Route::get('weights/delete/{id}','WeightController@delete');

    // Frame Colors
    Route::get('framecolors/{id}','AddonController@framecolors');
    Route::get('framecolor/create/{id}','AddonController@addframecolor');
    Route::post('createframcolor','AddonController@addframcolor');
    Route::get('framecolor/edit/{id}','AddonController@editframcolor');
    Route::post('updateframecolor/{id}','AddonController@updateframcolor');
    Route::get('framecolor/delete/{id}','AddonController@deleteframcolor'); 

    // frame Glasses
    Route::get('frameglasses/{id}','AddonController@frameglass');
    Route::get('frameglass/create/{id}','AddonController@addframeglass');
    Route::post('createfraemglass','AddonController@createframeglass');
    Route::get('frameglass/edit/{id}','AddonController@editframeglass');
    Route::post('updateframeglass/{id}','AddonController@updateframeglass');
    Route::get('frameglass/delete/{id}','AddonController@deleteframeglass');

    // Furniture addon
    Route::get('addfurniture/{id}','AddonController@addfurniture');
    Route::post('createfurniture','AddonController@createfurniture');
    Route::get('editfurniture/{id}','AddonController@editfurniture');
    Route::post('updatefurniture/{id}','AddonController@updatefurniture');
    Route::get('deletefurniture/{id}','AddonController@deletefurniture');

    // Glasses
    Route::get('addglass/{id}','AddonController@addglass');
    Route::post('createglass','AddonController@createglass');
    Route::get('editglass/{id}','AddonController@editglass');
    Route::post('updateglass/{id}','AddonController@updateglass');
    Route::get('deleteglass/{id}','AddonController@deleteglass');
    
    // Addon Hinge
    Route::get('addhinge/{id}','AddonController@addhinge');
    Route::post('addon/checkhinge','AddonController@checkhinge');
    Route::post('addon/createhinge','AddonController@createhinge');
    Route::get('addon/removehinge/{id}','AddonCOntroller@removehinge');
    //Routes For Product Deals admin side
    Route::get('productdeals','ProductDealController@index');
    Route::get('productdeals/create','ProductDealController@create'); 
    Route::post('productdeals/store','ProductDealController@store');
    Route::get('productdeals/edit/{id}','ProductDealController@edit');
    Route::post('productdeals/update/{id}','ProductDealController@update');
    Route::get('productdeals/delete/{id}','ProductDealController@delete');
    Route::post('productdeals/removeprd','ProductDealController@removeprd');
    Route::post('productdeals/prdouctqty','ProductDealController@updateprdqty');
    Route::post('productdeals/removeimage','ProductDealController@removeimage');

    // Request Hiring Route For Admin Side 
    Route::get('requesthiring','RequestHiringController@index');
    Route::post('hirestatus','RequestHiringController@change_hirestatus');
    Route::get('hiringdetails/{id}','RequestHiringController@hiringdetails');
    // Sliders Routes 
    Route::get('sliders','SliderController@index');
    Route::get('sliders/create','SliderController@create');
    Route::post('sliders/store','SliderController@store');
    Route::get('sliders/edit/{id}','SliderController@edit');
    Route::post('sliders/update/{id}','SliderController@update');
    Route::get('sliders/delete/{id}','SliderController@delete');
    

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

    // Test monial 
    Route::get('addtestmonial/{id}','InstallerController@addtestmonial');
    Route::post('storetestmonial','InstallerController@storetestmonial');
    Route::get('edittestmonial/{id}','InstallerController@edittestmonial');
    Route::post('updatetestmonial/{id}','InstallerController@updatetestmonial');
    Route::get('deletetestmonial/{id}','InstallerController@deletetestmonial');
    // NewsLetter And SubScription

Route::get('subscription','SubscriptionController@index');
Route::get('deletesubscription/{id}','SubscriptionController@delete');

// Feedback
Route::get('deletefeedback/{feedback_id}','ProductsController@deletefeedback');

// Notification 
    Route::post('countnotification' , 'NotificationController@count');
    Route::post('getnotification' , 'NotificationController@get');
    Route::get('notifydetails/{id}','NotificationController@details');
    Route::get('notifications','NotificationController@index');
    Route::get('deletenotify/{id}','NotificationController@delete');
    Route::get('readnotify/{id}','NotificationController@read');
    

    // Content Management Routes
    Route::get('cms','CMSController@index');
    Route::get('cms/add','CMSController@add');
    Route::post('cms/create','CMSController@create');
    Route::get('cms/edit/{id}','CMSController@edit');
    Route::get('cms/view/{id}','CMSController@view');
    Route::post('cms/update/{id}','CMSController@update');
    Route::get('cms/delete/{id}','CMSController@delete');
    // New User Message 
    Route::get('usermessage','UserMessageController@index');
    Route::get('messagedetails/{id}','UserMessageController@messagedetails');
    Route::get('messagedelete/{id}','UserMessageController@messagedelete');

    // Routes for coupen 
    Route::get('coupen','CoupenController@index');
    Route::get('coupen/create','CoupenController@add');
    Route::post('coupen/store','CoupenController@store');
    Route::get('coupen/edit/{id}','CoupenController@edit');
    Route::post('coupen/update/{id}','CoupenController@update');
    Route::get('coupen/delete/{id}','CoupenController@delete');
    // Route site setting
    Route::get('social','SocialController@index'); 
    Route::get('social/create','SocialController@create');
    Route::post('social/store','SocialController@store');
    Route::get('social/edit/{id}','SocialController@edit');
    Route::post('social/update/{id}','SocialController@update');
    Route::get('social/delete/{id}','SocialController@delete');

    // 
    Route::get('blogs','BlogController@index');
    Route::get('blogs/create','BlogController@create');
    Route::post('blogs/store','BlogController@store');
    Route::get('blogs/view/{id}','BlogController@view');
    Route::get('blogs/edit/{id}','BlogController@edit');
    Route::post('blogs/update/{id}','BlogController@update');
    Route::get('blogs/delete/{id}','BlogController@delete');
    Route::post('blogs/removeimage','BlogController@removeimage');
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
Route::post('submit-query','DoorBuilderController@forminput');
Route::post('checkoutsubmit','IndexController@checkoutsubmit');
Route::get('clearcart','IndexController@clearcart');
Route::post('checkservice','IndexController@checkservice');
Route::post('searchproduct','IndexController@searchproduct');
Route::post('sortproduct','IndexController@sortproduct');
Route::get('installerlist','IndexController@installerlist');
Route::get('installerdetails/{id}','IndexController@installerdetails');

Route::post('hirerequest','IndexController@hirerequest');
Route::post('get_installer','IndexController@get_installer');
Route::post('installerbyamount','IndexController@installerbyamount');
// Feedback 
Route::post('feedback','IndexController@feedback');
// Getting nav item

Route::get('customizer','IndexController@customizer');
Route::post('getnavlinks','IndexController@navlink');
// contact Us Routes
Route::get('contact-us','IndexController@contactus');
Route::post('contactsubmit','IndexController@contactsubmit');
Route::get('{id}','IndexController@cmspage');

// Blog Public Post 
Route::get('blog/posts','IndexController@blogpost');
Route::get('blog/details/{id}','IndexController@blogdetails');
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
    Route::get('changeaccount','CustomerController@changeaccount');
    Route::post('changeemail','CustomerController@changeemail');
    Route::get('verify','CustomerController@verify');
    Route::post('confirmcode','CustomerController@checkcode');
    Route::get('customerlogout','CustomerController@logout');
    
    Route::get('blog/posts','CustomerController@blogpost');
    Route::get('blogs/details/{id}','CustomerController@blogdetails');
    Route::post('checklike','CustomerController@checklike');
    Route::post('comment','CustomerController@comment');
    // Hire Reequest feedback 
    Route::post('hirefeedback','CustomerController@hirefeedback');
   
});
