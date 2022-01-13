<?php
Route::get('dashboard/ajax_country/{id}', 'CitizenController@ajax_country')->name('dashboard.ajax_country');
Route::get('dashboard/ajax_city/{id}', 'CitizenController@ajax_city')->name('dashboard.ajax_city');

Route::get('/admin-user-datatables', 'UserController@datatables')->name('admin-user-datatables');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');


            //user routes
            Route::resource('users', 'UserController')->except(['show']);
            Route::post('users/block/{id}', 'UserController@block')->name('users.block');

            Route::resource('roles', 'RoleController')->except(['show']);
            //citizen&&jobs
            Route::resource('jobs', 'JobController')->except(['show']);
            Route::resource('citizens', 'CitizenController');
            Route::get('report_citizen', 'CitizenController@Report')->name('report_citizen');

            //cards
            Route::resource('cards', 'CardController');
            //operations
            Route::resource('operations', 'OperationController')->except(['show']);
            Route::resource('finances', 'FinanceController')->except(['show']);
            Route::resource('adjectives', 'AdjectiveController')->except(['show']);


            //countries
            Route::resource('countries', 'CountryController')->except(['show']);
            Route::resource('provinces', 'ProvinceController')->except(['show']);
            Route::post('countries/block/{id}', 'CountryController@block')->name('countries.block');
            //cities
            Route::resource('cities', 'CityController')->except(['show']);
            Route::post('cities/block/{id}', 'CityController@block')->name('cities.block');
            //tribes
            Route::resource('tripes', 'TripeController')->except(['show']);
            //branches
            Route::resource('branches', 'BranchController')->except(['show']);
            //descents
            Route::resource('descents', 'DescentController')->except(['show']);
         //arithmetic
            Route::resource('arithmetic', 'ArithmeticController')->except(['show']);


//setting
            Route::post('settings', 'SettingController@updateAll')->name('settings.updateAll');
//logout
            Route::get('logout', 'UserController@logout')->name('logout');



        });//end of dashboard routes
    });





