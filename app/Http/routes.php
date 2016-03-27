<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get("/any","HomeController@get");
Route::get('/home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/','pagescontroller@index');

Route::get('/tagmoatna','pagescontroller@tagmoatna');


Route::get('/tagmoatna-event/{id}','pagescontroller@tagmoatnaevent');

Route::get('/tagmoatna-pictures/{id}','pagescontroller@tagmoatnapictures');

Route::get('/tagmoatna-videos/{id}','pagescontroller@tagmoatnavideos');

Route::get('/tagmoatna-videoplay/{id}','pagescontroller@tagmoatnavideoplay');

Route::post('/event_comment','pagescontroller@event_comment');

Route::get('/get_event_comment/{id}','pagescontroller@get_event_comment');





Route::get('/joinus','pagescontroller@joinus');



Route::get('/tagmoatna-donyana','pagescontroller@tagmoatnadonyana');
Route::get('/AdminControl','pagescontroller@showadmin');
Route::get('/etkalemy','pagescontroller@etkalemy');
Route::get('/contactus','pagescontroller@contactus');
Route::get('/aboutus','pagescontroller@aboutus');
Route::get('/login','pagescontroller@login');
Route::get('/personalPage','pagescontroller@personalPage');
Route::get('/EditPersonalPage','pagescontroller@EditPersonalPage');

Route::get('/personalPage', [
    'middleware' => 'auth',
    'uses' => 'pagescontroller@personalPage'
]);
Route::get('/personalPage', [
    'middleware' => 'auth',
    'uses' => 'pagescontroller@personalPage'
]);
Route::get('/EditPersonalPage', [
    'middleware' => 'auth',
    'uses' => 'pagescontroller@EditPersonalPage'
]);
//Route::get('/personalPage','pagescontroller@personalPage');
//Route::get('/EditPersonalPage','pagescontroller@EditPersonalPage');

/********* Slider Routes ************/
Route::group([
    'middleware' => ['auth','operation']
], function () {
    Route::resource('/slider','SliderController');
    Route::post('/delete_slider/{id}','SliderController@delete_slider');
    Route::post('/update_slider/{id}','SliderController@update_slider');
});

//Route::resource('/slider','SliderController');
//Route::post('/delete_slider/{id}','SliderController@delete_slider');
//Route::post('/update_slider/{id}','SliderController@update_slider');

/********** Albums Routes **********/
Route::group([
    'middleware' => ['auth','operation']
], function () {
Route::resource('/gallery','GalleryController');
Route::post('/delete_album/{id}','GalleryController@delete_album');
Route::get('/images_of_album/{id}','GalleryController@images_of_album');
Route::post('/update_image_of_album/{id}','GalleryController@update_image_of_album');
Route::post('/delete_image_of_album/{id}','GalleryController@delete_image_of_album');
Route::post('/update_album/{id}','GalleryController@update_album');
Route::post('/add_image_to_album/{id}','GalleryController@add_image_to_album');
});
/************ Articales Routes ***********/
Route::group([
    'middleware' => ['auth','operation']
], function () {
    Route::resource('/article', 'ArticleController');
    Route::get('/doniana', 'ArticleController@doniana');
    Route::get('/create_vedio', 'ArticleController@create_vedio');
    Route::get('/showArticles', 'ArticleController@showArticles');
    Route::get('/showVedios', 'ArticleController@showVedios');
    Route::post('/delete_article/{id}', 'ArticleController@delete_article');
    Route::post('/delete_vedio/{id}', 'ArticleController@delete_vedio');
    Route::post('/update_article/{id}', 'ArticleController@update_article');
});
/********** Event Routes ************/
Route::group([
    'middleware' => ['auth','operation']
], function () {
Route::resource('/event','EventController');
Route::post('/delete_event/{id}','EventController@delete_event');
Route::post('/update_event/{id}','EventController@update_event');
Route::post('/add_pictures/{id}','EventController@add_pictures');
Route::post('/add_vedios/{id}','EventController@add_vedios');
Route::get('/show_images_and_vedios/{id}','EventController@show_images_and_vedios');
Route::post('/delete_image_of_event/{id}','EventController@delete_image_of_event');
Route::post('/delete_vedio_of_event/{id}','EventController@delete_vedio_of_event');
Route::post('/edit_image_of_event/{id}','EventController@edit_image_of_event');
Route::post('/edit_vedio_of_event/{id}','EventController@edit_vedio_of_event');
});
/************* User Routes *****************/

Route::resource('/user','UserController');
Route::get('/create_login','UserController@create_login');
/*control pannel login */
Route::post('/login','UserController@login');
Route::get('/changePassword','UserController@changePassword');
Route::post('/change_user_data/{id}','UserController@change_user_data');


Route::get('/lang/{id}','LanguageController@getlang');



Route::post('/pay','PaypalController@pay');
//Route::get('/payment/status','PaypalController@getPaymentStatus');

Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));