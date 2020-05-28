<?php
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () { //...

        Route::group(['prefix' => 'admin'], function () {
            Route::get('another', function () { //admin/another
                return 'Another routing';
            });

            Route::get('/test', 'Dashboardcontroller@index'); //admin/test
            Route::get('/dotest', 'Dashboardcontroller@dotest'); //admin/dotest
            Route::resource('users', 'UserController');
            Route::get('create_emp', 'EmpolyeeController@create_emp');
            Route::post('store_emp', 'EmpolyeeController@store_emp')->name('store_emp');
            Route::get('printusers', 'UserController@print');
// Route::post('users', 'UserController@store');
            Route::resource('pages', 'PagesController');
//  Route::post('pages', 'PagesController@store');
            Route::get('printpages', 'PagesController@print');
            Route::resource('categories', 'CategoryController');
//atif

            Route::resource('employees', 'EmpolyeeController');



            Route::get('currentDate', 'ReportsController@currentDate');
            Route::resource('reports', 'ReportsController');
            Route::resource('countries', 'CountryController');
            Route::resource('usersemps', 'UsersEmpController');
            ////////////addstore
            Route::resource('addstore', 'AddstoreController');
            Route::get('getcity/{id}','AddstoreController@city');
            //////////////chat/////////

            ///////////
          //  Route::get('getcity/{id}',array('as'=>'myform.ajax','uses'=>'AddstoreController@city'));
            ////////////

            Route::get('/taha', function () {
                return view('dashboard/require/main');
            });

        });
    });
    Route::resource('chat', 'ChatController');
    Route::post('savechat','ChatController@saveshat');
