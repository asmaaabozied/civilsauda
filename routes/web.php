<?php

use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('dashboard.welcome')->middleware(['auth']);
/*   fronted website
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');

    Artisan::call('config:cache');
    return "Cache is cleared";
});







