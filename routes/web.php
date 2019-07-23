<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//loads home page with content
  Route::get('/', [
    'uses'=>'HomeController@index',
    'as' => '/'
  ]);

 //for admin
  Route::get('/admin','AdminController@index');
 //for admin dashboard  
  Route::get('/dashboard','SuperAdminController@index'); 

//for admin login verification  
  Route::post('/admin-verification','AdminController@adminVerification'); 

//for admin logout 
  Route::get('/logout','SuperAdminController@logout'); 

Route::group(['middleware' => 'eComm'], function(){
 


           
          //for admin all category 
            Route::get('/all-category','CategoryController@allCategory');

           //for admin add category 
            Route::get('/add-category','CategoryController@index');

           //for admin save category 
            Route::post('/save-category','CategoryController@saveCategory'); 

           //for admin change status category 
            Route::get('/unpublished-category/{categoryId}','CategoryController@unpublishedCategory');

           //for admin change status category 
            Route::get('/published-category/{categoryId}','CategoryController@publishedCategory');

           //for admin Edit category 
            Route::get('/edit-category/{categoryId}','CategoryController@editCategory');    

           //for admin update category 
            Route::post('/update-category/{categoryId}','CategoryController@updateCategory'); 

           //for admin delete category 
            Route::get('/delete-category/{categoryId}','CategoryController@deleteCategory');   


           //for admin all brands 
            Route::get('/all-brand','BrandController@allBrand');

           //for admin add brands 
            Route::get('/add-brand','BrandController@index');

           //for admin save brand
            Route::post('/save-brand','BrandController@saveBrand'); 

           //for admin change status brand 
            Route::get('/unpublished-brand/{brandId}','BrandController@unpublishedBrand');

           //for admin change status brand 
            Route::get('/published-brand/{brandId}','BrandController@publishedBrand');

           //for admin Edit brand 
            Route::get('/edit-brand/{brandId}','BrandController@editBrand');    

           //for admin update brand 
            Route::post('/update-brand/{brandId}','BrandController@updateBrand'); 

          //for admin delete brand
            Route::get('/delete-brand/{brandId}','BrandController@deleteBrand'); 


          //for admin all products 
            Route::get('/all-product','ProductController@allProduct');

           //for admin add products 
            Route::get('/add-product','ProductController@index');   

            //for admin save product
            Route::post('/save-product','ProductController@saveProduct');

           //for admin change status product 
            Route::get('/unpublished-product/{productId}','ProductController@unpublishedProduct');

           //for admin change status product 
            Route::get('/published-product/{productId}','ProductController@publishedProduct');

          //for admin delete product
            Route::get('/delete-product/{productId}','ProductController@deleteProduct');

           //for admin Edit product
            Route::get('/edit-product/{productId}','ProductController@editProduct');    

           //for admin update Product
            Route::post('/update-product/{productId}','ProductController@updateProduct');


          //routes for slider
            Route::get('/add-slider','SliderController@index');

            Route::post('/save-slider','SliderController@saveSlider');     

            Route::get('/all-slider','SliderController@allSlider');

           //for admin change status slider 
            Route::get('/unpublished-slider/{sliderId}','SliderController@unpublishedSlider');

           //for admin change status slider 
            Route::get('/published-slider/{sliderId}','SliderController@publishedSlider');

            Route::get('/delete-slider/{sliderId}','SliderController@deleteSlider');  


          //admin manage order
            Route::get('/manage-order','ManageOrderController@manageOrder');
            Route::get('/view-order/{orderId}','ManageOrderController@viewOrder');
});





//fron-end to show category products from home
Route::get('/product-by-category/{categoryId}','HomeController@showProductByCategory');  

Route::get('/product-by-brand/{brandId}','HomeController@showProductByBrand'); 

Route::get('/view-product-detail/{productId}','HomeController@viewDetailProduct');  




//cart
Route::post('/add-to-cart','CartController@addToCart'); 
Route::get('/show-cart','CartController@showCart'); 
Route::get('/delete-cart/{rowId}','CartController@deleteCart');
Route::post('/update-cart','CartController@updateCart');   


//chcekout
Route::get('/login-check','CheckoutController@loginCheck'); 
Route::post('/customer-registration','CheckoutController@customerRegistration'); 
Route::get('/checkout','CheckoutController@Checkout');
Route::post('/save-shipping-detail','CheckoutController@saveShippingDetail');
Route::get('/customer-logout','CheckoutController@customerLogout');
Route::post('/customer-login','CheckoutController@customerLogin');
Route::get('/payment','CheckoutController@Payment');
Route::post('/order-place','CheckoutController@orderPlace');

