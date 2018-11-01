<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




#API Start here

Route::post('/user/sign-in-facebook', 'ApiController@facebookSignIn');
Route::post('/user/forget-password', 'ApiController@forgetPassword');



Route::post('/user/sign-in', 'ApiController@SignIn');
Route::post('/user/sign-up', 'ApiController@SignUp');
Route::post('/user/update-profile', 'ApiController@updateProfile');

Route::post('/user/get-statues', 'ApiController@GetStatues');
Route::post('/user/get-cities', 'ApiController@GetCities');
Route::post('/user/get-statue-info', 'ApiController@GetStatueInfo');
Route::post('/user/get-places', 'ApiController@GetPlaces');
Route::post('/user/get-places-info', 'ApiController@GetPlaceInfo');

Route::post('/user/scan-statue', 'ApiController@ScanStatues');
Route::post('/user/visit-statue', 'ApiController@VisitStatue');

Route::post('/user/get-sponsor-logos', 'ApiController@GetSponsorLogos');
Route::post('/user/get-rewards', 'ApiController@GetRewards');
Route::post('/user/get-awards', 'ApiController@GetAwards');
Route::post('/user/get-template', 'ApiController@GetTemplates');
Route::post('/user/get-all-template', 'ApiController@GetAllTemplates');
Route::post('/user/get-aboutus', 'ApiController@GetAboutUs');
Route::post('/user/get-faqs', 'ApiController@GetFAQS');
Route::post('/user/get-all-slides', 'ApiController@GetAllSlides');

Route::post('/user/set-selfie', 'ApiController@SetSelfie');

//Below one is Not working
Route::post('/user/redeem-award', 'ApiController@RedeemAward');
