<?php

use App\UsersModel;

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

Route::get('/', 'FrontEndController@index');
Route::get('/about', 'FrontEndController@about');
Route::get('/faq', 'FrontEndController@faq');
Route::get('/contact', 'FrontEndController@contact');
Route::get('/listall', 'FrontEndController@all');
Route::get('/listfeatured', 'FrontEndController@featured');
Route::get('/channels/{category}', 'FrontEndController@category');
Route::get('/services/order/{id}', 'FrontEndController@order');
Route::post('/subscribe', 'FrontEndController@subscribe');
Route::post('/profile/email', 'FrontEndController@usermail');
Route::post('/contact/email', 'FrontEndController@contactmail');
Route::get('/profile/{id}/{name}', 'FrontEndController@viewprofile');
Route::get('/tv/{id}', 'FrontEndController@tv');


Route::get('/admin', function () {
    return view('admin.index');
});


Route::get('/login', function () {
    return view('admin.login');
});

Auth::routes();

Route::get('/admin/dashboard', 'HomeController@index');

Route::post('admin/settings/title', 'SettingsController@title');
Route::post('admin/settings/payment', 'SettingsController@payment');
Route::post('admin/settings/about', 'SettingsController@about');
Route::post('admin/settings/address', 'SettingsController@address');
Route::post('admin/settings/footer', 'SettingsController@footer');
Route::post('admin/settings/logo', 'SettingsController@logo');
Route::post('admin/settings/favicon', 'SettingsController@favicon');
Route::post('admin/settings/background', 'SettingsController@background');
Route::resource('/admin/settings', 'SettingsController');

Route::resource('/admin/sliders', 'SliderController');
Route::resource('/admin/tv', 'TvDetailsController');
Route::resource('/admin/category', 'CategoryController');


Route::post('admin/pagesettings/about', 'PageSettingsController@about');
Route::post('admin/pagesettings/faq', 'PageSettingsController@faq');
Route::post('admin/pagesettings/contact', 'PageSettingsController@contact');
Route::resource('/admin/pagesettings', 'PageSettingsController');

Route::get('admin/ads/status/{id}/{status}', 'AdvertiseController@status');

Route::resource('/admin/ads', 'AdvertiseController');
Route::post('/admin/social/comment', 'SocialLinkController@comment');
Route::resource('/admin/social', 'SocialLinkController');
Route::resource('/admin/tools', 'SeoToolsController');
Route::get('admin/subscribers/download', 'SubscriberController@download');

Route::resource('/admin/subscribers', 'SubscriberController');
Route::post('/admin/adminpassword/change/{id}', 'AdminProfileController@changepass');
Route::get('/admin/adminpassword', 'AdminProfileController@password');
Route::resource('/admin/adminprofile', 'AdminProfileController');

Route::get('/admin/orders/status/{id}', 'OrderController@status');
Route::get('/admin/orders/email/{id}', 'OrderController@email');
Route::post('/admin/orders/emailsend', 'OrderController@sendemail');
Route::resource('/admin/orders', 'OrderController');

Route::post('/payment', 'PaymentController@store')->name('payment.submit');
Route::get('/payment/cancle', 'PaymentController@paycancle')->name('payment.cancle');
Route::get('/payment/return', 'PaymentController@payreturn')->name('payment.return');
Route::post('/payment/notify', 'PaymentController@notify')->name('payment.notify');


