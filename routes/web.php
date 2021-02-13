<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/','Frontend\FrontendController@index')->name('index');
Route::get('/aboutUs','Frontend\FrontendController@aboutUs')->name('aboutUs');
Route::get('/contactUs','Frontend\FrontendController@contactUs')->name('contactUs');
Route::get('/shoppingcart','Frontend\FrontendController@shoppingcart')->name('shoppingcart');
Route::post('/store/contact','Frontend\FrontendController@store')->name('store.contact');



Route::get('/home', 'HomeController@index')->name('home');

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

});

