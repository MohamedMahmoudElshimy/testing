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
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){

    Route::group(['prefix' => 'offers' ], function(){

        Route::get('create', 'App\Http\Controllers\Backend\BackendController@create');
        Route::post('store', 'App\Http\Controllers\Backend\BackendController@store')->name('offers.store');

        Route::get('edit/{id}', 'App\Http\Controllers\Backend\BackendController@editOffer')->name('offers.edit');
        Route::post('update/{id}', 'App\Http\Controllers\Backend\BackendController@updateOffer')->name('offers.update');
        Route::get('delete/{id}', 'App\Http\Controllers\Backend\BackendController@delete')->name('offers.delete');


        Route::get('allOffer', 'App\Http\Controllers\Backend\BackendController@allOffer')->name('offer.allDB');
    });


});


########################## Start Route Profile ##################################
Route::group(['prefix' => 'profile' ], function(){

    Route::get('create', 'App\Http\Controllers\Backend\ProfileController@create');
    Route::post('store', 'App\Http\Controllers\Backend\ProfileController@store')->name('ajax.profiles.store');
    Route::get('all', 'App\Http\Controllers\Backend\ProfileController@all');
    Route::post('delete', 'App\Http\Controllers\Backend\ProfileController@delete')->name('ajax.profiles.delete');
    Route::get('edit/{id}', 'App\Http\Controllers\Backend\ProfileController@edit')->name('ajax.profiles.edit');
    Route::post('update', 'App\Http\Controllers\Backend\ProfileController@update')->name('ajax.profiles.update');

});

########################## End Route Profile ##################################

########################## Start Authentication && Guards ##################################

Route::group(['middleware' => 'CheckAge','namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::get('adults', 'AdminController@adults')->name('not.adult');
});

Route::get('welcome', 'App\Http\Controllers\Auth\AdminController@adult')->name('yes.adult');

//middleware('auth')
Route::get('site', 'App\Http\Controllers\Auth\AdminController@site')->middleware('auth:web')-> name('site');
Route::get('admin', 'App\Http\Controllers\Auth\AdminController@admin')->middleware('auth:admin') -> name('admin');

Route::get('admin/login', 'App\Http\Controllers\Auth\AdminController@adminLogin')-> name('admin.login');
Route::post('login/admin', 'App\Http\Controllers\Auth\AdminController@checkAdminLogin')-> name('save.admin.login');


##################### End Authentication && Guards ##############




Auth::routes(['verify' => true]);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('verified');


Route::get('/redirect/{service}', 'App\Http\Controllers\SocialController@redirect');
Route::get('/callback/{service}', 'App\Http\Controllers\SocialController@callback');
