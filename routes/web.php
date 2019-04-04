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

Route::get('/', 'RootController@index')->name('root');
Route::get('/test', 'TestController@index')->name('test');
Route::get('/resources', 'DbcoResourceController@main')->name('resources.main');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
/**---------------------------------------------------**/
Route::get('/dbcosolution/{isolutioncategory?}', 'DbcoSolutionController@index')->name('dbcosolution.index');
Route::get('/solution/{id}', 'DbcoSingleSolutionController@main')->name('dbcosolution.single');
Route::post('/dbcosolution/{id}', 'DbcoSolutionController@toggle')->name('dbcosolution.toggle')->middleware('verified');
/**---------------------------------------------------**/
Route::get('/lk/customer', 'Customer\CustomerIndexController@main')->name('customer.main')->middleware('verified');
Route::put('/lk/customer', 'Customer\CustomerIndexController@update')->name('customer.update')->middleware('verified');

/**---------------------------------------------------**/
Route::get('/lk/tickets', 'Customer\CustomerTicketController@main')->name('tickets.main')->middleware('verified');
Route::post('/lk/tickets', 'Customer\CustomerTicketController@store')->name('tickets.store')->middleware('verified');

Route::get('/lk/solutions', 'Customer\CustomerSolutionsController@main')->name('customersolutions.main')->middleware('verified');
Route::get('/lk/finance', 'Customer\CustomerFinanceController@main')->name('customerfinance.main')->middleware('verified');
Route::get('/lk/db', 'Customer\CustomerDbController@main')->name('customerdb.main')->middleware('verified');
Route::put('/lk/db', 'Customer\CustomerDbController@update')->name('customerdb.update')->middleware('verified');
Route::post('/lk/db', 'Customer\CustomerDbController@postupdate')->name('customerdb.postupdate')->middleware('verified');

/**----- для ajax-свитчей ------**/
Route::post('/togglesolutionajax', 'ToggleSolutionAjaxController@main')->name('togglesolutionajax.main')->middleware('verified');