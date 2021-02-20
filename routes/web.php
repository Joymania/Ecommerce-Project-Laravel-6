<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//Single Page Routes
Route::get('/','Frontend\FrontendController@index')->name('index');
Route::get('/aboutUs','Frontend\FrontendController@aboutUs')->name('aboutUs');
Route::get('/contactUs','Frontend\FrontendController@contactUs')->name('contactUs');
Route::get('/shoppingcart','Frontend\FrontendController@shoppingcart')->name('shoppingcart');
Route::post('/store/contact','Frontend\FrontendController@store')->name('store.contact');
Route::get('/productlist','Frontend\FrontendController@productlist')->name('productlist');
Route::get('/product-category/{category_id}','Frontend\FrontendController@categoryWiseProduct')->name('category.wise.product');
Route::get('/product-brand/{brand_id}','Frontend\FrontendController@brandWiseProduct')->name('brand.wise.product');
Route::get('/productdetails/{slug}','Frontend\FrontendController@productdetails')->name('productdetailsinfo');

//Shopiing Cart Routes
Route::post('/add-to-cart','Frontend\CartController@insert')->name('insert.cart');
Route::get('/show-cart','Frontend\CartController@show')->name('show.cart');
Route::post('/store-cart','Frontend\CartController@update')->name('store.cart');
Route::get('/delete-cart/{rowId}','Frontend\CartController@delete')->name('delete.cart');

//Customer Login Routes
Route::get('/customer-login','Frontend\CustomerloginController@customerlogin')->name('customer-login');
Route::get('/customer-signup','Frontend\CustomerloginController@customersignup')->name('customer-signup');
Route::post('/signup-store','Frontend\CustomerloginController@signupStore')->name('signup-store');
Route::get('/verify-email','Frontend\CustomerloginController@verifyemail')->name('verify-email');
Route::post('verify-store','Frontend\CustomerloginController@verifystore')->name('verify-store');


Route::get('/home', 'HomeController@index')->name('home');

//Backend Route
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('users')->group(function(){
    Route::get('/view','Backend\UserController@view')->name('users.view');
    Route::get('/add','Backend\UserController@add')->name('users.add');
    Route::post('/store','Backend\UserController@store')->name('users.store');
    Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
    Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
    Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
});

Route::prefix('profiles')->group(function(){
    Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
    Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
    Route::post('/update','Backend\ProfileController@update')->name('profiles.update');

    Route::get('/edit/password','Backend\ProfileController@passwordedit')->name('password.edit');
    Route::post('/update/password','Backend\ProfileController@passwordupdate')->name('password.update');
});

Route::prefix('logo')->group(function(){
    Route::get('/view','Backend\LogoController@view')->name('logo.view');
    Route::get('/add','Backend\LogoController@add')->name('logo.add');
    Route::post('/store','Backend\LogoController@store')->name('logo.store');
    Route::get('/edit/{id}','Backend\LogoController@edit')->name('logo.edit');
    Route::post('/update/{id}','Backend\LogoController@update')->name('logo.update');
    Route::get('/delete/{id}','Backend\LogoController@delete')->name('logo.delete');
});

Route::prefix('slider')->group(function(){
    Route::get('/view','Backend\SliderController@view')->name('slider.view');
    Route::get('/add','Backend\SliderController@add')->name('slider.add');
    Route::post('/store','Backend\SliderController@store')->name('slider.store');
    Route::get('/edit/{id}','Backend\SliderController@edit')->name('slider.edit');
    Route::post('/update/{id}','Backend\SliderController@update')->name('slider.update');
    Route::get('/delete/{id}','Backend\SliderController@delete')->name('slider.delete');
});

Route::prefix('contact')->group(function(){
    Route::get('/view','Backend\ContactController@view')->name('contact.view');
    Route::get('/add','Backend\ContactController@add')->name('contact.add');
    Route::post('/store','Backend\ContactController@store')->name('contact.store');
    Route::get('/edit/{id}','Backend\ContactController@edit')->name('contact.edit');
    Route::post('/update/{id}','Backend\ContactController@update')->name('contact.update');
    Route::get('/delete/{id}','Backend\ContactController@delete')->name('contact.delete');
    Route::get('/communicate/view','Backend\ContactController@communicateview')->name('communicate.view');
    Route::get('/communicate/delete/{id}','Backend\ContactController@communicatedelete')->name('communicate.delete');
});

Route::prefix('about_us')->group(function(){
    Route::get('/view','Backend\AboutusController@view')->name('about_us.view');
    Route::get('/add','Backend\AboutusController@add')->name('about_us.add');
    Route::post('/store','Backend\AboutusController@store')->name('about_us.store');
    Route::get('/edit/{id}','Backend\AboutusController@edit')->name('about_us.edit');
    Route::post('/update/{id}','Backend\AboutusController@update')->name('about_us.update');
    Route::get('/delete/{id}','Backend\AboutusController@delete')->name('about_us.delete');
});

Route::prefix('category')->group(function(){
    Route::get('/view','Backend\CategoryController@view')->name('category.view');
    Route::get('/add','Backend\CategoryController@add')->name('category.add');
    Route::post('/store','Backend\CategoryController@store')->name('category.store');
    Route::get('/edit/{id}','Backend\CategoryController@edit')->name('category.edit');
    Route::post('/update/{id}','Backend\CategoryController@update')->name('category.update');
    Route::get('/delete/{id}','Backend\CategoryController@delete')->name('category.delete');
});

Route::prefix('brand')->group(function(){
    Route::get('/view','Backend\BrandController@view')->name('brand.view');
    Route::get('/add','Backend\BrandController@add')->name('brand.add');
    Route::post('/store','Backend\BrandController@store')->name('brand.store');
    Route::get('/edit/{id}','Backend\BrandController@edit')->name('brand.edit');
    Route::post('/update/{id}','Backend\BrandController@update')->name('brand.update');
    Route::get('/delete/{id}','Backend\BrandController@delete')->name('brand.delete');
});

Route::prefix('color')->group(function(){
    Route::get('/view','Backend\ColorController@view')->name('color.view');
    Route::get('/add','Backend\ColorController@add')->name('color.add');
    Route::post('/store','Backend\ColorController@store')->name('color.store');
    Route::get('/edit/{id}','Backend\ColorController@edit')->name('color.edit');
    Route::post('/update/{id}','Backend\ColorController@update')->name('color.update');
    Route::get('/delete/{id}','Backend\ColorController@delete')->name('color.delete');
});

Route::prefix('size')->group(function(){
    Route::get('/view','Backend\SizeController@view')->name('size.view');
    Route::get('/add','Backend\SizeController@add')->name('size.add');
    Route::post('/store','Backend\SizeController@store')->name('size.store');
    Route::get('/edit/{id}','Backend\SizeController@edit')->name('size.edit');
    Route::post('/update/{id}','Backend\SizeController@update')->name('size.update');
    Route::get('/delete/{id}','Backend\SizeController@delete')->name('size.delete');
});

Route::prefix('product')->group(function(){
    Route::get('/view','Backend\ProductController@view')->name('product.view');
    Route::get('/add','Backend\ProductController@add')->name('product.add');
    Route::post('/store','Backend\ProductController@store')->name('product.store');
    Route::get('/edit/{id}','Backend\ProductController@edit')->name('product.edit');
    Route::post('/update/{id}','Backend\ProductController@update')->name('product.update');
    Route::get('/delete/{id}','Backend\ProductController@delete')->name('product.delete');
});


});

