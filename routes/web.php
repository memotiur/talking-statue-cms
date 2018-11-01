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

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login-check', 'LoginController@loginCheck');
Route::get('/admin-home', 'HomeController@adminHome');
Route::get('/logout', 'HomeController@logout');

//Statue
Route::get('/admin/new-statue', 'StatueController@index');
Route::post('/admin/save-statue', 'StatueController@store');
Route::get('/admin/view-statue', 'StatueController@show');
Route::get('/admin/view-statue/edit/{id}', 'StatueController@edit');
Route::post('/admin/edit-statue/save', 'StatueController@editSave');
Route::get('/admin/view-statue/delete/{id}', 'StatueController@delete');

//City Manage
Route::get('/admin/new-city', 'CityController@index');
Route::post('/admin/save-city', 'CityController@store');
Route::get('/admin/view-city', 'CityController@show');
Route::get('/admin/view-city/delete/{id}', 'CityController@destroy');
Route::get('/admin/view-city/edit/{id}', 'CityController@edit');
Route::post('/admin/save-edited-city', 'CityController@editedSave');

//Manage FAQ
Route::get('/admin/new-faq', 'FaqController@index');
Route::post('/admin/save-faq', 'FaqController@store');
Route::get('/admin/view-faq', 'FaqController@show');
Route::get('/admin/view-faq/delete/{id}', 'FaqController@destroy');
Route::get('/admin/view-faq/edit/{id}', 'FaqController@edit');
Route::post('/admin/update-faq', 'FaqController@update');

//Manage FAQ
Route::get('/admin/new-faq', 'FaqController@index');
Route::post('/admin/save-faq', 'FaqController@store');

Route::get('/admin/view-selfie', 'SelfiesController@show');
Route::get('/admin/view-faq/delete/{id}', 'FaqController@destroy');
Route::get('/admin/view-faq/edit/{id}', 'FaqController@edit');
Route::post('/admin/update-faq', 'FaqController@update');
Route::get('/admin/selfie/spam-report/{id}', 'SelfiesController@spamReported');

//Setting
Route::get('/admin/setting', 'HomeController@setting');
Route::post('/admin/setting/update', 'HomeController@settingUpdate');

//Sponsor Logo
Route::get('/admin/view-sponsor-logo', 'SponsorLogoController@show');
Route::get('/admin/view-sponsor-logo/create', 'SponsorLogoController@create');
Route::post('/admin/view-sponsor-logo/store', 'SponsorLogoController@store');
Route::get('/admin/view-sponsor-logo/edit/{id}', 'SponsorLogoController@edit');
Route::post('/admin/view-sponsor-logo/update', 'SponsorLogoController@update');
Route::get('/admin/view-sponsor-logo/delete/{id}', 'SponsorLogoController@destroy');

//Slider Image
Route::get('/admin/view-slide-image', 'TopSlideImageController@show');
Route::get('/admin/view-slide-image/create', 'TopSlideImageController@create');
Route::post('/admin/view-slide-image/store', 'TopSlideImageController@store');
Route::get('/admin/view-slide-image/edit/{id}', 'TopSlideImageController@edit');
Route::post('/admin/view-slide-image/update', 'TopSlideImageController@update');
Route::get('/admin/view-slide-image/delete/{id}', 'TopSlideImageController@destroy');

//Manage User
Route::get('/admin/view-users', 'UserController@show');
Route::get('/admin/user/deactive/{id}', 'UserController@deactivate');
Route::get('/admin/user/reactive/{id}', 'UserController@reactivate');

Route::get('/admin/new-app-user', 'UserController@appuserIndex');
Route::post('/admin/save-app-user', 'UserController@appuserSave');
Route::get('/admin/edit-app-user/{id}', 'UserController@editAppUser');
Route::get('/admin/delete-app-user/{id}', 'UserController@deleteAppUser');

//CMS User
Route::get('/admin/view-cms-users', 'UserController@showCmsusers');
Route::get('/admin/new-cms-users', 'UserController@newCmsusers');
Route::post('/admin/save-cms-user', 'UserController@saveCmsUser');
Route::get('/admin/edit-cms-user/{id}', 'UserController@editCmsUser');
Route::get('/admin/delete-cms-user/{id}', 'UserController@deleteCmsUser');
Route::post('/admin/update-cms-user', 'UserController@updateCmsUser');


//Manage Places
Route::get('/admin/new-place', 'PlaceController@index');
Route::get('/admin/view-place', 'PlaceController@show');
Route::post('/admin/save-place', 'PlaceController@store');
Route::get('/admin/place/delete/{id}', 'PlaceController@destroy');
Route::get('/admin/place/edit/{id}', 'PlaceController@edit');
Route::post('/admin/edit-place/save', 'PlaceController@update');

//Manage Template
Route::get('/admin/new-template', 'TemplateController@index');
Route::get('/admin/view-templates', 'TemplateController@show');
Route::post('/admin/save-template', 'TemplateController@store');
Route::get('/admin/template/delete/{id}', 'TemplateController@destroy');
Route::get('/admin/template/edit/{id}', 'TemplateController@edit');
Route::post('/admin/edit-template/save', 'TemplateController@update');

//Manage Reward
Route::get('/admin/new-reward', 'RewardController@index');
Route::get('/admin/view-rewards', 'RewardController@show');
Route::post('/admin/save-reward', 'RewardController@store');
Route::get('/admin/reward/delete/{id}', 'RewardController@destroy');
Route::get('/admin/reward/edit/{id}', 'RewardController@edit');
Route::post('/admin/edit-reward/save', 'RewardController@update');


Route::get('/admin/reward/active/{reward_id}/{active_stat}', 'RewardController@makeActive');

//Reedem Reward
Route::get('/admin/view-redeem-awards', 'RewardController@`');

Route::get('/admin/view-activity-logs', 'ActivityLogController@index');

//Manage /admin/view-about
Route::get('/admin/view-about', 'AboutController@index');
Route::get('/admin/view-about/edit/{id}', 'AboutController@edit');
Route::post('/admin/save-edited-about', 'AboutController@update');


#API Start here
Route::post('/user/activity-save', 'ActivityController@save');
Route::post('/user/reward-save', 'RewardController@save');

//Forget password
Route::get('/user/password-reset/{id}', 'Controller@resetPassword');
Route::post('/user/save-password', 'Controller@savePassword');
Route::get('/pass-update', function () {
    return view('password_reset.reset_password_done');
});
